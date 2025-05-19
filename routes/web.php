<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // other web routes here
});

Route::get('test-web', function () {
    return 'Web route works!';
});
