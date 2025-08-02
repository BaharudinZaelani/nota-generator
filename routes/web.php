<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



Route::get('/', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/nota/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');

// Route for clearing cache, config, and routes
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Cache, config, and routes cleared successfully!';
})->name('clear.cache');