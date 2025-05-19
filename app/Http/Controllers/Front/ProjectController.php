<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectController extends Controller
{
    private CONST PATH = 'front.project.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $project_status_active = ProjectStatus::query()
                ->select("code")
                ->active()
                ->first();

            /** @var LengthAwarePaginator $services */
            $projects = Project::query()
                ->whereHas("image")
                ->whereRelation("projectStatus", "code", "=", $project_status_active->code)
                ->with([
                    "image:id,project_id,path",
                ])
                ->paginate(6);


            return view(self::PATH."index", compact("projects"));
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $project_slug)
    {
        try {
            $project_status_active = ProjectStatus::query()
                ->select("code")
                ->active()
                ->first();

            /** @var Project $project */
            $project = Project::query()
                ->whereHas("image")
                ->with([
                    "image:id,project_id,path",
                    "documents",
                    "galleries:id,project_id,path",
                ])
                ->whereRelation("projectStatus", "code", "=", $project_status_active->code)
                ->where("slug", $project_slug)
                ->first();

            $other_projects = Project::query()
                ->select("name", "slug")
                ->whereRelation("projectStatus", "code", "=", $project_status_active->code)
                ->where("slug", "!=", $project_slug)
                ->take(6)
                ->get();

            return view(self::PATH."show", compact("project", "other_projects"));
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            abort(404);
        }
    }

}
