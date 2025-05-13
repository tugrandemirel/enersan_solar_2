<?php

namespace App\Http\Controllers\Admin\Project;

use App\Enum\Project\ProjectDocumentTypeEnum;
use App\Helper\DateHelper;
use App\Helper\FileHelper;
use App\Helper\SlugHelper;
use App\Helpers\Response\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\ProjectStoreRequest;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Service\ProjectDatatableService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    private const PATH = "admin.project.";
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $project_service = new ProjectDatatableService();
                return $project_service->getAllData($request);
            }

            return view(self::PATH . "index");
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            /** @var ProjectStatus $project_statuses */
            $project_statuses = ProjectStatus::query()
                ->get();
            return view(self::PATH . "create", compact("project_statuses"));
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request): JsonResponse
    {
        $attributes = collect($request->validated());

        DB::beginTransaction();
        try {
            $project_status_active = ProjectStatus::query()
                ->select("id", "code")
                ->active()
                ->first();

            $project_status_passive = ProjectStatus::query()
                ->select("id", "code")
                ->passive()
                ->first();

            $project_status_id = $attributes->get("project_status") === $project_status_passive->code ? $project_status_passive?->id : $project_status_active?->id;

            $slug = SlugHelper::generateUniqueSlug($attributes->get("project_name"), Project::class);

            $project = Project::query()->create([
                "uuid" => Str::uuid(),
                "name" => $attributes->get("project_name"),
                "slug" => $slug,
                "description" => $attributes->get("content"),
                "project_status_id" => $project_status_id,
                "created_by_user_id" => auth()->user()->id,
            ]);

            if ($request->hasFile("image")) {
                $upload_image = FileHelper::uploadFile($request->file("image"));

                $project->image()->create([
                    "uuid" => Str::uuid(),
                    "file_name" => $upload_image["file_name"],
                    "file_ext" => $upload_image["file_ext"],
                    "size" => $upload_image["size"],
                    "path" => $upload_image["path"],
                    "type" => ProjectDocumentTypeEnum::IMAGE,
                ]);
            }

            if ($request->hasFile("images")) {
                foreach ($request->file("images") as $image) {
                    $upload_image = FileHelper::uploadFile($image);
                    $project->galleries()->create([
                        "uuid" => Str::uuid(),
                        "file_name" => $upload_image["file_name"],
                        "file_ext" => $upload_image["file_ext"],
                        "size" => $upload_image["size"],
                        "path" => $upload_image["path"],
                        "type" => ProjectDocumentTypeEnum::GALLERY,
                    ]);
                }
            }

            if ($request->hasFile("file_one")) {
                $upload_file = FileHelper::uploadFile($request->file("file_one"));
                $project->documents()->create([
                    "uuid" => Str::uuid(),
                    "file_name" => $upload_file["file_name"],
                    "file_ext" => $upload_file["file_ext"],
                    "size" => $upload_file["size"],
                    "path" => $upload_file["path"],
                    "type" => ProjectDocumentTypeEnum::DOCUMENT,
                ]);
            }

            if ($request->hasFile("file_two")) {
                $upload_file = FileHelper::uploadFile($request->file("file_two"));
                $project->documents()->create([
                    "uuid" => Str::uuid(),
                    "file_name" => $upload_file["file_name"],
                    "file_ext" => $upload_file["file_ext"],
                    "size" => $upload_file["size"],
                    "path" => $upload_file["path"],
                    "type" => ProjectDocumentTypeEnum::DOCUMENT,
                ]);
            }

            DB::commit();
            $route = route("admin.projects.show", ["project_uuid" => $project->uuid]);

            return ResponseHelper::success("Proje başarıyla oluşturuldu", ["route" => $route]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return ResponseHelper::error("Bir hata oluştu", $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $project_uuid)
    {
        try {
            $project = Project::query()
                ->with([
                    "image:id,project_id,file_name,file_ext,path",
                    "documents:id,project_id,file_name,file_ext,path",
                    "galleries:id,project_id,file_name,file_ext,path",
                    "projectStatus:id,code,name",
                ])
                ->where("uuid", $project_uuid)
                ->first();

            if (!$project) {
                abort(404);
            }

            $project->created_at_formatted = DateHelper::full($project->created_at);

            return view(self::PATH . "show", compact("project"));

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $project_uuid): JsonResponse
    {
        DB::beginTransaction();

        // Silinmesi gereken dosyaları geçici olarak tut
        $filesToDelete = [];

        try {
            $project = Project::query()
                ->where("uuid", $project_uuid)
                ->first();

            if (!$project) {
                return ResponseHelper::error("Proje bulunamadı");
            }

            // Görsel
            if ($project->image) {
                $filesToDelete[] = $project->image->path;
                $project->image->delete();
            }

            // Dökümanlar
            if ($project->documents) {
                foreach ($project->documents as $document) {
                    $filesToDelete[] = $document->path;
                    $document->delete();
                }
            }

            // Galeri
            if ($project->galleries) {
                foreach ($project->galleries as $gallery) {
                    $filesToDelete[] = $gallery->path;
                    $gallery->delete();
                }
            }

            // Projeyi sil
            $project->delete();


            // Başarılıysa dosyaları sil
            foreach ($filesToDelete as $filePath) {
                FileHelper::deleteFile($filePath);
            }

            DB::commit();
            return ResponseHelper::success("Proje başarıyla silindi");

        } catch (\Exception $exception) {
            DB::rollBack();
            return ResponseHelper::error("Bir hata oluştu", $exception->getMessage());
        }
    }

}
