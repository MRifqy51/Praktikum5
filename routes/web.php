<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/praktikum5', function () {
    return view('praktikum5');
});
Route::get('/list_product', [ListProductController::class, 'listproduk']);
Route::get('/home', function () {
    return view('pages.home');
});
