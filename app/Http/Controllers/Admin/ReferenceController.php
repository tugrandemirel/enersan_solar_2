<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FileHelper;
use App\Helpers\Response\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reference\ReferenceStoreRequest;
use App\Models\Reference;
use App\Service\ReferenceDatatableService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReferenceController extends Controller
{
    private CONST PATH = "admin.reference.";
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $reference_service = new ReferenceDatatableService();
                return $reference_service->getAllData($request);
            }
            return view(self::PATH . 'index');
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReferenceStoreRequest $request)
    {
        $attributes = collect($request->validated());

        try {
            $reference = new Reference();
            $reference->uuid = Str::uuid();
            $reference->name = $attributes->get('name');
            $reference->url = $attributes->get('url');
            $reference->description = $attributes->get('desc');
            $reference->created_by_user_id = auth()->id();

            if ($request->hasFile("image")) {
                $upload_image = FileHelper::uploadFile($request->file("image"));
                $reference->image = $upload_image['path'];
            }

            $reference->save();

            return ResponseHelper::success("Başarıyla kaydedildi.");
        } catch (\Exception $exception) {
            return ResponseHelper::error("Bir hata oluştu.", $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reference $reference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reference $reference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reference $reference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $reference_uuid)
    {
        try {
            /** @var Reference $reference */
            $reference = Reference::query()
                ->where("uuid", $reference_uuid)
                ->first();

            $image_path = $reference->image;

            $reference?->delete();

            if ($image_path) {
                FileHelper::deleteFile($image_path);
            }

            return ResponseHelper::success("Başarıyla silindi.");
        } catch (\Exception $exception) {
            return ResponseHelper::error("Bir hata oluştu.", $exception->getMessage());
        }
    }
}
