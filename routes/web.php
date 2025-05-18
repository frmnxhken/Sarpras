<?php

use App\Http\Controllers\DataInventarisController;
use App\Http\Controllers\DataRuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.app');
});

Route::get('/inventaris',[DataInventarisController::class, 'index']);
Route::post('/inventaris/tambah', [DataInventarisController::class, 'store'])->name('inventaris.store');
Route::get('/inventaris/detail/{id}', [DataInventarisController::class, 'show'])->name('inventaris.detail');
Route::put('/inventaris/detail/{id}', [DataInventarisController::class, 'update'])->name('inventaris.update');
Route::delete('/inventaris/detail/{id}', [DataInventarisController::class, 'destroy'])->name('inventaris.destroy');

Route::get('/ruang', [DataRuanganController::class, 'index']);
Route::post('/ruang/tambah', [DataRuanganController::class, 'store']);
Route::post('/ruang/ubah/{id}', [DataRuanganController::class, 'edit']);

Route::get('/verivikasiAjuan', function () {
    return view('ajuan.app');
});
Route::get('/laporanInventaris', function () {
    return view('laporan.inventaris');
});
Route::get('/laporanPeminjaman', function () {
    return view('laporan.peminjaman');
});
Route::get('/laporanPerawatan', function () {
    return view('laporan.perawatan');
});
Route::get('/laporanMutasi', function () {
    return view('laporan.mutasi');
});
Route::get('/laporanPenghapusan', function () {
    return view('laporan.penghapusan');
});

Route::get('/pengaturan', function () {
    return view('pengaturan.app');
});