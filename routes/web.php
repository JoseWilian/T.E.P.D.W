<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [ProductController::class, 'index'])->name("products");
Route::get('products/create', [ProductController::class, 'create'])->name("products.create");
Route::post('products', [ProductController::class, 'store']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::post('/delete-selection', [ProductController::class, 'deleteSelection'])->name('delete.selection');
