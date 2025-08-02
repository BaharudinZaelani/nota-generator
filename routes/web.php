<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/nota/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');