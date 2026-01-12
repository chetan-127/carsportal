<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\CarController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PageController;

Route::get('/get-car', function () {
    return view('leads');
});

Route::get('car-form', [LeadController::class, 'showForm'])->name('car.form');
Route::post('car-form', [LeadController::class, 'submitForm'])->name('car-form.submit');
Route::get('/', [HomeController::class, 'index']);


Route::get('admin/login', AdminController::class . '@login')->name('admin.login');
Route::post('admin/login', AdminController::class . '@dologin');
Route::middleware(AdminMiddleware::class)->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('car-manager', [AdminController::class, 'CarManager'])->name('admin.car.manager');
    Route::get('banner-manager', [AdminController::class, 'BannerManager'])->name('admin.banner.manager');
    Route::get('header-manager', [AdminController::class, 'HeaderManager'])->name('admin.header.manager');
    Route::get('/lead-manager', [LeadController::class, 'index'])
        ->name('admin.leads.index');

    Route::get('/banner-manager', [BannerController::class, 'index'])->name('banners.index');

    Route::get('/banner-create', [BannerController::class, 'create'])
        ->name('banner.create');

    Route::post('/banner-manager', [BannerController::class, 'store'])
        ->name('banner.store');

    Route::get('banner/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::post('banner/{banner}/update', [BannerController::class, 'update'])->name('banners.update');

    Route::delete('banner/{banner}', [BannerController::class, 'destroy'])->name('banners.delete');

    Route::get('/car-manager', [CarController::class, 'index'])->name('cars.index');

    Route::get('/add-car', [CarController::class, 'create'])
        ->name('cars.create');
    Route::post('/car-manager', [CarController::class, 'store'])
        ->name('car.store');

    Route::get('car/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('car/{car}/update', [CarController::class, 'update'])->name('cars.update');
    Route::delete('car/{car}', [CarController::class, 'destroy'])->name('cars.destroy');


    Route::get('/header-manager', [HeaderController::class, 'index'])->name('header.index');
    Route::get('/add-header', [HeaderController::class, 'create'])->name('header.create');
    Route::post('/header-manager', [HeaderController::class, 'store'])->name('header.store');

    Route::get('/admin/header/{menu}/edit', [HeaderController::class, 'edit'])->name('header.edit');
    Route::post('/admin/header/{menu}/update', [HeaderController::class, 'update'])->name('header.update');
    Route::delete('/admin/header/{menu}', [HeaderController::class, 'destroy'])->name('header.delete');
});

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', '.*');
