<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/import-products', [ProductsController::class, 'importProductsPage'])->name('importPage');

Route::post('/upload-products', [ProductsController::class, 'importFromExcelToBD'])->name('upload');

Route::get('/products', [ProductsController::class, 'productsPage'])->name('productsPage');

Route::post('/download-image', [ProductsController::class, 'downloadImage'])->name('download');


//Route::get('/products', [ProductsController::class, 'productsPageWithRequest'])->name('productsPageWithRequest');


