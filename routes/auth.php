<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Página de login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Enviar login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
