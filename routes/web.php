<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Penduduk & Surat (Accessible by Admin and Petugas)
    Route::resource('penduduk', PendudukController::class);
    Route::resource('template', TemplateController::class);
    Route::resource('surat', SuratController::class);
    Route::get('surat/{surat}/download', [SuratController::class, 'downloadPdf'])->name('surat.download');

    // Admin Only
    Route::middleware('role:admin')->group(function () {
        Route::resource('user', UserController::class);
        Route::get('activity-log', [ActivityLogController::class, 'index'])->name('activity-log.index');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
