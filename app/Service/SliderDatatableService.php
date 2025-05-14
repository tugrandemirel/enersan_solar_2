<?php

namespace App\Service;

use App\Helpers\Response\ResponseHelper;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderDatatableService
{
    public function getAllData(Request $request)
    {
        try {
            $sliders = Slider::query()
                ->with("createdByUser:id,name")
                ->orderBy('created_at', 'desc');

            return DataTables::eloquent($sliders)->toJson();
        } catch (\Exception $exception) {
            return ResponseHelper::error("Slider çekme işlemi sırasında bir hata oluştu.", $exception->getMessage());
        }
    }
}
