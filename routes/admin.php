<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\SiteSetting\ContactSettingController;
use App\Http\Controllers\Admin\SiteSetting\GeneralSettingController;
use App\Http\Controllers\Admin\SiteSetting\SiteSettingController;
use App\Http\Controllers\Admin\SiteSetting\SocialMediaSettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferenceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->as("admin.")->group(function () {
    Route::get("/", [IndexController::class, "index"])->name("index");

    Route::prefix("services")->as("services.")->group(callback: function () {
        Route::any("/", [ServiceController::class, "index"])->name("index");
        Route::post("/store", [ServiceController::class, "store"])->name("store");
        Route::get("/create", [ServiceController::class, "create"])->name("create");
        Route::get("/{service_uuid}", [ServiceController::class, "show"])->name("show");
        Route::delete("/destroy/{service_uuid}", [ServiceController::class, "destroy"])->name("destroy");
    });

    Route::prefix("projects")->as("projects.")->group(callback: function () {
        Route::any("/", [ProjectController::class, "index"])->name("index");
        Route::post("/store", [ProjectController::class, "store"])->name("store");
        Route::get("/create", [ProjectController::class, "create"])->name("create");
        Route::get("/{project_uuid}", [ProjectController::class, "show"])->name("show");
        Route::delete("/destroy/{project_uuid}", [ProjectController::class, "destroy"])->name("destroy");
    });

    Route::prefix("sliders")->as("sliders.")->group(callback: function () {
        Route::any("/", [SliderController::class, "index"])->name("index");
        Route::post("/store", [SliderController::class, "store"])->name("store");
        Route::get("/create", [SliderController::class, "create"])->name("create");
        Route::get("/edit/{slider_uuid}", [SliderController::class, "edit"])->name("edit");
        Route::get("/{slider_uuid}", [SliderController::class, "show"])->name("show");
        Route::delete("/destroy/{slider_uuid}", [SliderController::class, "destroy"])->name("destroy");
    });

    Route::prefix("references")->as("references.")->group(callback: function () {
        Route::any("/", [ReferenceController::class, "index"])->name("index");
        Route::post("/store", [ReferenceController::class, "store"])->name("store");
        Route::get("/create", [ReferenceController::class, "create"])->name("create");
        Route::get("/edit/{reference_uuid}", [ReferenceController::class, "edit"])->name("edit");
        Route::get("/{reference_uuid}", [ReferenceController::class, "show"])->name("show");
        Route::delete("/destroy/{reference_uuid}", [ReferenceController::class, "destroy"])->name("destroy");
    });

    Route::prefix('site-setting')->as('site_setting.')->group(callback: function (){
        Route::get('/', [SiteSettingController::class, 'index'])->name('index');
        Route::post('/general-setting', [GeneralSettingController::class, 'store'])->name('general-setting-store');
        Route::post('/contact-setting', [ContactSettingController::class, 'store'])->name('contact-setting-store');
        Route::post('/social-media-setting', [SocialMediaSettingController::class, 'store'])->name('social-media-setting');
    });
});

