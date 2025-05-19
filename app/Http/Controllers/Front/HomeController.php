<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Reference;
use App\Models\Service;
use App\Models\ServiceStatus;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private CONST PATH = 'front.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            /** @var Slider $sliders */
            $sliders = Slider::query()
                ->get();

            $service_status_active = ServiceStatus::query()
                ->select("code")
                ->active()
                ->first();

            $services = Service::query()
                ->whereHas("image")
                ->whereRelation("serviceStatus", "code", "=", $service_status_active->code)
                ->with([
                    "image:id,service_id,path",
                ])
                ->limit(10)
                ->get();


            $project_active_status = ProjectStatus::query()
                ->select("code")
                ->active()
                ->first();

            $projects = Project::query()
                ->whereRelation("projectStatus", "code", "=", $project_active_status->code)
                ->with("image:id,project_id,path")
                ->limit(10)
                ->get();

            $references = Reference::query()
                ->select(["id", "image", "url", "description"])
                ->get();

            return view(self::PATH . 'index', compact("sliders", "services", "projects", "references"));
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
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
