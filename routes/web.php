<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product-list', [ProductController::class, 'product_list']);

// There are 3 parts in URL
// Part 1 :- Which Is Actual URL
// 2 :- conroller Name
// 3 :- Thiird One Is function Name