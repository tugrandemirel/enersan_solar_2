<?php

use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\ServiceController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix("hizmetlerimiz")->as("services.")->group(callback: function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/{service_slug}', [ServiceController::class, 'show'])->name('show');
});
Route::prefix("projelerimiz")->as("projects.")->group(callback: function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/{project_slug}', [ProjectController::class, 'show'])->name('show');
});
Route::prefix("iletisim")->as("contacts.")->group(callback: function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
