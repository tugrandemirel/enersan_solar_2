<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceStatus;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceController extends Controller
{
    private CONST PATH = 'front.service.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $service_status_active = ServiceStatus::query()
                ->select("code")
                ->active()
                ->first();

            /** @var LengthAwarePaginator $services */
            $services = Service::query()
                ->whereHas("image")
                ->whereRelation("serviceStatus", "code", "=", $service_status_active->code)
                ->with([
                    "image:id,service_id,path",
                ])
                ->paginate(6);


            return view(self::PATH."index", compact("services"));
        } catch (\Exception $exception) {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $service_slug)
    {
        try {
            $service_status_active = ServiceStatus::query()
                ->select("code")
                ->active()
                ->first();

            /** @var Service $service */
            $service = Service::query()
                ->whereHas("image")
                ->with([
                    "image:id,service_id,path",
                    "documents",
                ])
                ->whereRelation("serviceStatus", "code", "=", $service_status_active->code)
                ->where("slug", $service_slug)
                ->first();
            if (!$service) {
                abort(404);
            }
            $other_services = Service::query()
                ->select("name", "slug")
                ->whereRelation("serviceStatus", "code", "=", $service_status_active->code)
                ->where("slug", "!=", $service?->slug)
                ->take(6)
                ->get();

            return view(self::PATH."show", compact("service", "other_services"));
        } catch (\Exception $exception) {
            abort(404);
        }
    }
}
