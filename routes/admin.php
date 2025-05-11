<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\SiteSetting\ContactSettingController;
use App\Http\Controllers\Admin\SiteSetting\GeneralSettingController;
use App\Http\Controllers\Admin\SiteSetting\SiteSettingController;
use App\Http\Controllers\Admin\SiteSetting\SocialMediaSettingController;
use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->as("admin.")->group(function () {
    Route::get("/", [IndexController::class, "index"])->name("index");

    Route::prefix("services")->as("services.")->group(callback: function () {
        Route::any("/", [ServiceController::class, "index"])->name("index");
        Route::post("/store", [ServiceController::class, "store"])->name("store");
        Route::get("/create", [ServiceController::class, "create"])->name("create");
        Route::get("/{service_uuid}", [ServiceController::class, "show"])->name("show");
    });

    Route::prefix('site-setting')->as('site_setting.')->group(callback: function (){
        Route::get('/', [SiteSettingController::class, 'index'])->name('index');
        Route::post('/general-setting', [GeneralSettingController::class, 'store'])->name('general-setting-store');
        Route::post('/contact-setting', [ContactSettingController::class, 'store'])->name('contact-setting-store');
        Route::post('/social-media-setting', [SocialMediaSettingController::class, 'store'])->name('social-media-setting');
    });
});

