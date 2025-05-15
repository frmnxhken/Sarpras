<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('hello.app');
// });

Route::get('/', function () {
    return view('home.app');
});

Route::get('/inventaris', function () {
    return view('inventaris.data-inventaris');
});

Route::get('/ruang', function () {
    return view('ruang.data-ruang');
});
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