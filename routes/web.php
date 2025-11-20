<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookIssueController;

Route::get('/', function () {return view('welcome');});
Route::get('/product-list', [ProductController::class, 'product_list'])->name('product.list');
Route::get('/product-store-form', [ProductController::class, 'product_store_form'])->name('product.store.form');
Route::post('/product-store', [ProductController::class, 'product_store'])->name('product.store');
Route::delete('/product/{id}', [ProductController::class, 'SoftDeleteproduct'])->name('product.destroy');
Route::get('/product/{id}/edit', [ProductController::class, 'productedit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'productupdate'])->name('product.update');
Route::get('/product-home', [ProductController::class, 'producthome'])->name('product.home');
Route::get('/product/{id}', [ProductController::class, 'productView'])->name('product.view');
Route::get('/students', [StudentController::class, 'studentlist'])->name('student.list');
Route::get('/students/create', [StudentController::class, 'studentcreateform'])->name('student.create');
Route::post('/students/store', [StudentController::class, 'studentstore'])->name('student.store');
Route::get('/bookissue/create', [BookIssueController::class, 'create'])->name('bookissue.create');
Route::post('/bookissue/store', [BookIssueController::class, 'store'])->name('bookissue.store');
Route::get('/bookissue', [BookIssueController::class, 'index'])->name('bookissue.index');



// There are 4 parts in URL
// 1 :- Which Is Actual URL
// 2 :- controller Name
// 3 :- Third One Is function Name
// 4 :- Name which is used to Redirect or Mantion in form tag in any form


// Route::post('/product-store', [ProductController::class, 'product_store']);