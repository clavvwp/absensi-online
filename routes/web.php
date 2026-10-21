<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WaliKelasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('form.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::get('/wali-kelas/dashboard', [WaliKelasController::class, 'showDashboard'])
    ->middleware(['auth', 'role:wali_kelas'])
    ->name('wali_kelas.dashboard');