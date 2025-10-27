<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UtangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenjualanController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');

// Penjualan
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::post('/penjualan/transaksi', [PenjualanController::class, 'store'])->name('penjualan.store');

// Utang
Route::resource('utang', App\Http\Controllers\UtangController::class);

// Pemasukan & Pengeluaran
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

