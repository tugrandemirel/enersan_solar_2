<?php

namespace App\Service;

use App\Helpers\Response\ResponseHelper;
use App\Models\Reference;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReferenceDatatableService
{
    public function getAllData(Request $request)
    {
        try {
            $references = Reference::query()
                ->with("createdByUser:id,name")
                ->orderBy('created_at', 'desc');

            return DataTables::eloquent($references)->toJson();
        } catch (\Exception $exception) {
            return ResponseHelper::error("Referanslar çekme işlemi sırasında bir hata oluştu.", $exception->getMessage());
        }
    }
}
