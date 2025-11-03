<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product-list', [ProductController::class, 'product_list'])->name('product.list');
// Route::post('/product-store', [ProductController::class, 'product_store']);
Route::get('/product-store-form', [ProductController::class, 'product_store_form'])->name('product.store.form');
Route::post('/product-store', [ProductController::class, 'product_store'])->name('product.store');
Route::delete('/product/{id}', [ProductController::class, 'SoftDeleteproduct'])->name('product.destroy');
Route::get('/product/{id}/edit', [ProductController::class, 'productedit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'productupdate'])->name('product.update');
Route::get('/product-home', [ProductController::class, 'producthome'])->name('product.home');



// There are 4 parts in URL
// 1 :- Which Is Actual URL
// 2 :- controller Name
// 3 :- Third One Is function Name
// 4 :- Name which is used to Redirect or Mantion in form tag in any form