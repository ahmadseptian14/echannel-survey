<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KunjunganUkerController;
use App\Http\Controllers\KunjunganCabangController;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});

Route::prefix('kunjungan-cabang')->middleware('auth')->group(function () {
    Route::get('/', [KunjunganCabangController::class, 'index'])->name('kunjungancabang.index');
    Route::get('/detail/{id}', [KunjunganCabangController::class, 'detail'])->name('kunjungancabang.detail');
    Route::get('/search', [KunjunganCabangController::class, 'search'])->name('kunjungancabang.search');
    Route::get('/input', [KunjunganCabangController::class, 'inputKunjungan'])->name('kunjungancabang.input');
    Route::post('/store', [KunjunganCabangController::class, 'store'])->name('kunjungancabang.store');
});

Route::prefix('kunjungan-uker')->middleware('auth')->group(function () {
    Route::post('/store', [KunjunganUkerController::class, 'store'])->name('kunjunganuker.store');
    Route::get('/detail/{id}', [KunjunganUkerController::class, 'detail'])->name('kunjunganuker.detail');
});

Auth::routes();
