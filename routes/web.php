<?php

use App\Http\Controllers\AjuanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataRuanganController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PerawatanController;
// use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.app');
});

Route::get('/inventaris',[BarangController::class, 'index']);
Route::post('/inventaris/tambah', [BarangController::class, 'store'])->name('inventaris.store');
Route::get('/inventaris/detail/{id}', [BarangController::class, 'show'])->name('inventaris.detail');
Route::put('/inventaris/detail/{id}', [BarangController::class, 'update'])->name('inventaris.update');
Route::delete('/inventaris/detail/{id}', [BarangController::class, 'destroy'])->name('inventaris.destroy');

Route::get('/barang/scan/result/{kode}', [BarangController::class, 'scanResult']);
Route::get('/scan',function () {
    return view('inventaris.scan');
});


Route::get('/ruang', [DataRuanganController::class, 'index']);
Route::post('/ruang/tambah', [DataRuanganController::class, 'store']);
Route::post('/ruang/ubah/{id}', [DataRuanganController::class, 'edit']);
//hapus

Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/peminjaman/tambah', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'index'])->name('peminjaman.destroy');
Route::put('/peminjaman/{id}/{status}/{jumlah_barang}/{barang_id}', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');
Route::get('/laporan/peminjaman/pdf', [PeminjamanController::class, 'cetakPDF'])->name('peminjaman.cetakPDF');
Route::get('/laporan/peminjaman/excel', [PeminjamanController::class, 'exportExcel'])->name('peminjaman.exportExcel');

Route::get('/verivikasiAjuan', [AjuanController::class, 'index']);
// Route::put('/verivikasiAjuan{id}/{status}', [AjuanController::class, 'UpdateStatus'])->name('ajuan.updateStatus');
Route::put('/ajuan/update/{type}/{id}/{status}', [AjuanController::class, 'UpdateStatus'])->name('ajuan.updateStatus');


Route::get('/perawatan', [PerawatanController::class, 'index']);
Route::put('/perawatan/{id}/{status}', [PerawatanController::class, 'UpdateStatus'])->name('perawatan.updateStatus');
Route::post('/perawatan', [PerawatanController::class, 'store'])->name('perawatan.store');



Route::get('/mutasi', function () {
    return view('mutasi.app');
});
Route::get('/penghapusan', function () {
    return view('penghapusan.app');
});


Route::get('/dataRuang', [DataRuanganController::class, 'index']);
Route::get('/kategoriBarang', function () {
    return view('pengaturan.kategori.app');
});
Route::get('/kelolaBarang', function () {
    return view('pengaturan.kelola.app');
});