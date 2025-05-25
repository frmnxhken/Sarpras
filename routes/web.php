<?php

use App\Http\Controllers\AjuanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataRuanganController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenghapusanController;
// use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::post('/login',[AuthController::class, 'Authenticate']);
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Inventaris
    Route::get('/inventaris', [BarangController::class, 'index']);
    Route::post('/inventaris/tambah', [BarangController::class, 'store'])->name('inventaris.store');
    Route::get('/inventaris/detail/{id}', [BarangController::class, 'show'])->name('inventaris.detail');
    Route::put('/inventaris/detail/{id}', [BarangController::class, 'update'])->name('inventaris.update');
    Route::delete('/inventaris/hapus/{id}', [BarangController::class, 'destroy'])->name('inventaris.destroy');
    Route::delete('/inventaris/ajukanHapus/{id}', [BarangController::class, 'destroyApp'])->name('inventaris.destroy.app');

    Route::get('/barang/scan/result/{kode}', [BarangController::class, 'scanResult']);
    Route::view('/scan', 'inventaris.scan');

    // Ruangan
    Route::get('/ruang', [DataRuanganController::class, 'index']);
    Route::post('/ruang/tambah', [DataRuanganController::class, 'store']);
    Route::post('/ruang/ubah/{id}', [DataRuanganController::class, 'edit']);

    // Peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::post('/peminjaman/tambah', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    Route::put('/peminjaman/{id}/{status}/{jumlah_barang}/{barang_id}', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');
    Route::get('/laporan/peminjaman/pdf', [PeminjamanController::class, 'cetakPDF'])->name('peminjaman.cetakPDF');
    Route::get('/laporan/peminjaman/excel', [PeminjamanController::class, 'exportExcel'])->name('peminjaman.exportExcel');

    // Ajuan
    Route::get('/verivikasiAjuan', [AjuanController::class, 'index']);
    Route::put('/ajuan/update/{type}/{id}/{status}', [AjuanController::class, 'UpdateStatus'])->name('ajuan.updateStatus');

    // Perawatan
    Route::get('/perawatan', [PerawatanController::class, 'index']);
    Route::post('/perawatan', [PerawatanController::class, 'store'])->name('perawatan.store');
    Route::put('/perawatan/{id}', [PerawatanController::class, 'update'])->name('perawatan.update');
    Route::delete('/perawatan/{id}', [PerawatanController::class, 'destroy'])->name('perawatan.destroy');
    Route::put('/perawatan/updateStatus/{id}', [PerawatanController::class, 'updateStatus'])->name('perawatan.updateStatus');

    // Mutasi
    Route::get('/mutasi', [MutasiController::class, 'index']);
    Route::post('/mutasi', [MutasiController::class, 'store'])->name('mutasi.store');
    Route::put('/mutasi', [MutasiController::class, 'updateStatus'])->name('mutasi.updateStatus');
    Route::put('/mutasi/{id}', [MutasiController::class, 'update'])->name('mutasi.update');
    Route::delete('/mutasi/{id}', [MutasiController::class, 'destroy'])->name('mutasi.destroy');

    // Penghapusan
    Route::get('/penghapusan', [PenghapusanController::class, 'index']);
    Route::post('/penghapusan/{id}/update', [PenghapusanController::class, 'update'])->name('penghapusan.update');
    Route::delete('/penghapusan/{id}', [PenghapusanController::class, 'destroy'])->name('penghapusan.destroy');

    // Laporan
    Route::get('/laporan/perawatan', [PerawatanController::class, 'laporan']);
    Route::get('/laporan/peminjaman', [PeminjamanController::class, 'laporan']);
    Route::get('/laporan/mutasi', [MutasiController::class, 'laporan']);
    Route::get('/laporan/penghapusan', [PenghapusanController::class, 'laporan']);

    // Pengaturan
    Route::get('/pengaturan/ruangan', [DataRuanganController::class, 'index']);
    Route::get('/pengaturan/user', [UserController::class, 'index']);
    Route::delete('/pengaturan/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/pengaturan/user/tambah', [UserController::class, 'store'])->name('user.store');
    Route::put('/pengaturan/user/{id}', [UserController::class, 'update'])->name('user.update');
});