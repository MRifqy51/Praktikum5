<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/praktikum5', function () {
    return view('praktikum5');
});
