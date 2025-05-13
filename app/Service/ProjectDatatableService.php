<?php

namespace App\Service;

use App\Helpers\Response\ResponseHelper;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectDatatableService
{
    public function getAllData(Request $request): JsonResponse
    {
        try {

            $projects = Project::query()
                ->select([
                    "projects.id",
                    "projects.uuid",
                    "projects.name",
                    "projects.created_at",
                    "projects.project_status_id",
                    "projects.created_by_user_id",
                ])
                ->with([
                    "image:id,path,project_id",
                    "createdByUser:id,name",
                    "projectStatus:id,code,name",
                ])
                ->orderBy('projects.created_at', 'desc');

            return DataTables::eloquent($projects)->toJson();
        } catch (\Exception $exception) {
            return ResponseHelper::error("İşlem sırasında bir hata oluştu", $exception->getMessage());
        }
    }
}
