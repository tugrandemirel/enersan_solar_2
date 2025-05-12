<?php

namespace App\Http\Controllers\Admin\Service;

use App\Enum\Service\ServiceDocumentTypeEnum;
use App\Helper\DateHelper;
use App\Helper\FileHelper;
use App\Helper\SlugHelper;
use App\Helpers\Response\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\ServiceStoreRequest;
use App\Models\Service;
use App\Models\ServiceStatus;
use App\Models\User;
use App\Service\ServiceDatatableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    private const PATH = "admin.service.";
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            if ($request->ajax()) {
                $service_datatable = new ServiceDatatableService();
                return $service_datatable->getAllData($request);
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
            $service_statuses = ServiceStatus::query()
                ->get();

            return view(self::PATH . "create", compact("service_statuses"));
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceStoreRequest $request)
    {
        $attributes = collect($request->validated());

        /** @var User $auth_user */
        $auth_user = auth()->user();

        DB::beginTransaction();
        try {
            /** @var ServiceStatus $service_status_active */
            $service_status_active = ServiceStatus::query()
                ->select("code", "id")
                ->active()
                ->first();

            /** @var ServiceStatus$service_status_passive */
            $service_status_passive = ServiceStatus::query()
                ->select("code", "id")
                ->passive()
                ->first();

            $code = $attributes->get("service_status") == $service_status_active->code ? $service_status_active->id : $service_status_passive->id;

            $slug = SlugHelper::generateUniqueSlug($attributes->get("service_name"), Service::class);


            /** @var Service $service */
            $service = Service::query()
                ->create([
                    "uuid" => Str::uuid(),
                    "name" => $attributes->get("service_name"),
                    "slug" => $slug,
                    "description" => $attributes->get("content"),
                    "service_status_id" => $code,
                    "created_by_user_id" => $auth_user?->id,
                ]);

            if ($request->hasFile("image")) {
                $image = $request->file("image");
                $upload_image = FileHelper::uploadFile($image);

                $service->image()->create([
                    "uuid" => Str::uuid(),
                    "file_name" => $upload_image["file_name"],
                    "file_ext" => $upload_image["file_ext"],
                    "size" => $upload_image["size"],
                    "path" => $upload_image["path"],
                ]);
            }

            if ($request->hasFile("file_one")) {
                $file_one = $request->file("file_one");
                $upload_file_one = FileHelper::uploadFile($file_one);

                $service->documents()->create([
                    "uuid" => Str::uuid(),
                    "file_name" => $upload_file_one["file_name"],
                    "file_ext" => $upload_file_one["file_ext"],
                    "size" => $upload_file_one["size"],
                    "path" => $upload_file_one["path"],
                    "type" => ServiceDocumentTypeEnum::DOCUMENT,
                ]);
            }

            if ($request->hasFile("file_two")) {
                $file_two = $request->file("file_two");
                $upload_file_two = FileHelper::uploadFile($file_two);

                $service->documents()->create([
                    "uuid" => Str::uuid(),
                    "file_name" => $upload_file_two["file_name"],
                    "file_ext" => $upload_file_two["file_ext"],
                    "size" => $upload_file_two["size"],
                    "path" => $upload_file_two["path"],
                    "type" => ServiceDocumentTypeEnum::DOCUMENT,
                ]);
            }

            DB::commit();
            $route = route("admin.services.show", ["service_uuid" => $service->uuid]);
            return ResponseHelper::success('İşleminiz başarılı bir şekilde gerçekleştirildi', ["route" => $route]);
        } catch (\Exception $exception) {
            DB::rollBack(); dd($exception->getMessage());
            return ResponseHelper::error('Bir hata oluştu.', [$exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $service_uuid)
    {
        try {

            /** @var Service $service */
            $service = Service::query()
                ->with([
                    "createdByUser:id,name",
                    "serviceStatus:id,code,name",
                    "image:id,service_id,file_name,file_ext,path",
                    "documents:id,service_id,file_name,file_ext,path"
                ])
                ->where("uuid", $service_uuid)
                ->first();

            $service->created_at_formatted = DateHelper::full($service->created_at);

            return view(self::PATH . "show", compact("service"));
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
    public function destroy(string $id)
    {
        //
    }
}
