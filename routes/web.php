<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProdukController;

/*
|--------------------------------------------------------------------------
| Halaman Pengguna
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/katalog', [HomeController::class, 'katalog'])
    ->name('katalog');

Route::get('/produk/{id}', [HomeController::class, 'detail'])
    ->name('produk.detail');


/*
|--------------------------------------------------------------------------
| Halaman Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('produk', ProdukController::class);

    });