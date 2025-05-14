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
Route::get('/lihatLaporan', function () {
    return view('laporan.app');
});
Route::get('/pengaturan', function () {
    return view('pengaturan.app');
});