<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FileHelper;
use App\Helpers\Response\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\SliderStoreRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mockery\Exception;

class SliderController extends Controller
{
    private CONST PATH = "admin.slider.";
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $sliderDatatableService = app("App\Service\SliderDatatableService");
                return $sliderDatatableService->getAllData($request);
            }
            return view(self::PATH."index");
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
    public function store(SliderStoreRequest $request)
    {
        $attributes = collect($request->validated());
        try {

            $slider = new Slider();
            $slider->uuid = Str::uuid();
            $slider->sub_title = $attributes->get("sub_title")  ?? null;
            $slider->title = $attributes->get("main_title")  ?? null;
            $slider->description = $attributes->get("desc")  ?? null;
            $slider->button_link_one = $attributes->get("button_link_one") ?? null;
            $slider->button_one_text = $attributes->get("button_one_text") ?? null;
            $slider->button_link_two = $attributes->get("button_link_two") ?? null;
            $slider->button_two_text = $attributes->get("button_two_text") ?? null;
            $slider->created_by_user_id = auth()->id();

            if ($request->hasFile("image")) {
                $upload_image = FileHelper::uploadFile($request->file("image"));
                $slider->image = $upload_image["path"];
            }

            $slider->save();

        } catch (Exception $exception) {
            return ResponseHelper::error("Bir hata oluştu", $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $slider_uuid)
    {
        try {
            $slider = Slider::query()
                ->where("uuid", $slider_uuid)
                ->first();

            $deleted_file_path = $slider->image;

            $slider?->delete();

            if ($deleted_file_path) {
                FileHelper::deleteFile($deleted_file_path);
            }
            return ResponseHelper::success("Slider başarıyla silindi");
        } catch (\Exception $exception) {
            return ResponseHelper::error("Bir hata oluştu", $exception->getMessage());
        }
    }
}
