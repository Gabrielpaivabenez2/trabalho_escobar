<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\AuthController; 


Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/veiculos/{id}', [PublicController::class, 'show'])->name('public.show');
Route::get('/api/brands/{id}/models', function($id){
    return \App\Models\CarModel::where('brand_id', $id)->get(['id','name']);
});

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');

Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('vehicles', AdminVehicleController::class)->except(['show']);
    Route::resource('brands', BrandController::class)->parameters(['brands'=>'brand']);
    Route::resource('car-models', CarModelController::class)->parameters(['car-models'=>'car_model']);
    Route::resource('colors', ColorController::class)->parameters(['colors'=>'color']);
});
