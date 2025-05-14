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