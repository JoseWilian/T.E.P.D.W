<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [ProductController::class, 'index'])->name("products");
Route::get('products/create', [ProductController::class, 'create'])->name("products.create");
Route::post('products', [ProductController::class, 'store']);
Route::get('products/{id}/edit', [ProductController::class, 'edit']);
Route::put('products/{id}', [ProductController::class, 'update']);
//Route::delete('products/{id}', [ProductController::class, 'destroy']);
Route::post('/delete-selection', [ProductController::class, 'deleteSelection'])->name('delete.selection');
