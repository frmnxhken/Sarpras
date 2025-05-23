<?php

use App\Http\Controllers\AjuanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataRuanganController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\DashboardController;
// use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/inventaris',[BarangController::class, 'index']);
Route::post('/inventaris/tambah', [BarangController::class, 'store'])->name('inventaris.store');
Route::get('/inventaris/detail/{id}', [BarangController::class, 'show'])->name('inventaris.detail');
Route::put('/inventaris/detail/{id}', [BarangController::class, 'update'])->name('inventaris.update');
Route::delete('/inventaris/hapus/{id}', [BarangController::class, 'destroy'])->name('inventaris.destroy');
Route::delete('/inventaris/ajukanHapus/{id}', [BarangController::class, 'destroyApp'])->name('inventaris.destroy.app');


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

Route::get('/mutasi', [MutasiController::class, 'index']);
Route::post('/mutasi', [MutasiController::class, 'store'])->name('mutasi.store');
Route::put('/mutasi', [MutasiController::class, 'updateStatus'])->name('mutasi.updateStatus');


Route::get('/penghapusan', function () {
    return view('penghapusan.app');
});

// laopran
Route::get('/laporan/mutasi', function () {
    return view('laporan.mutasi.app');
});
Route::get('/laporan/peminjaman', function () {
    return view('laporan.peminjaman.app');
});
Route::get('/laporan/perawatan', function () {
    return view('laporan.perawatan.app');
});
Route::get('/laporan/penghapusan', function () {
    return view('laporan.penghapusan.app');
});

Route::get('/dataRuang', [DataRuanganController::class, 'index'])->name('mutasi.exportExcel');

Route::get('/dataRuang', [DataRuanganController::class, 'index']);
Route::get('/kategoriBarang', function () {
    return view('pengaturan.kategori.app');
});
Route::get('/kelolaBarang', function () {
    return view('pengaturan.kelola.app');
});