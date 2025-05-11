<?php

namespace App\Service;

use App\Helper\DateHelper;
use App\Helpers\Response\ResponseHelper;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceDatatableService
{
    public function getAllData(Request $request): JsonResponse
    {
        try {

            $services = Service::query()
                ->select([
                    "services.id",
                    "services.uuid",
                    "services.name",
                    "services.created_at",
                    "services.service_status_id",
                    "services.created_by_user_id",
                ])
                ->with([
                    "image:id,path,service_id",
                    "createdByUser:id,name",
                    "serviceStatus:id,code,name",
                ])
                ->orderBy('services.created_at', 'desc');

            return DataTables::eloquent($services)->toJson();
        } catch (\Exception $exception) {
            return ResponseHelper::error("İşlem sırasında bir hata oluştu", $exception->getMessage());
        }
    }
}
