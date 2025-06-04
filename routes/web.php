<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProdukController;
use App\Http\Controllers\ListProductController;

Route::get('/listproduk', [ListProdukController::class, 'show'])->name('produk.index');

Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');

Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');

Route::put('/listproduk/{id}', [ListProdukController::class, 'update'])->name('produk.update');

Route::get('/listproduk/edit/{id}', [ListProdukController::class, 'edit'])->name('produk.edit');


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
