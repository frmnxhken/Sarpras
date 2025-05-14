<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('hello.app');
// });

Route::get('/', function () {
    return view('home.app');
});

Route::get('/menejemen', function () {
    return view('inventaris.data-inventaris');
});

Route::get('/ruang', function () {
    return view('ruang.data-ruang');
});