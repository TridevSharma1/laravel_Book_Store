<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product-list', [ProductController::class, 'product_list']);
// Route::post('/product-store', [ProductController::class, 'product_store']);
Route::get('/product-store-form', [ProductController::class, 'product_store_form']);
Route::post('/product-store', [ProductController::class, 'product_store'])->name('product.store');


// There are 4 parts in URL
// 1 :- Which Is Actual URL
// 2 :- controller Name
// 3 :- Third One Is function Name
// 4 :- Name which is used to Redirect or Mantion in form tag in any form