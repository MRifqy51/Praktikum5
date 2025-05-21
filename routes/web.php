<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\ListProdukController;

Route::get('listproduk', [ListProdukController::class, 'show'] );

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

