<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');


// Category
//Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');
//Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.create');
//Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
//Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//Route::put('/category/{category}', [CategoryController::class, 'update'])->name('categories.update');
//Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Users
Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
//Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
//Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
//Route::put('/user/{user}', [UserController::class, 'update'])->name('users.update');
//Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
//Route::get('/user/{user}', [UserController::class, 'show'])->name('users.show');
