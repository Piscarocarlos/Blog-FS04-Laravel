<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;



Route::get('/', [WebController::class, 'index'])->name('index');

Route::get('contact-us', [WebController::class, 'showContactView'])->name('contact');

Route::get('categories', [CategoryController::class, 'index'])->name('categories');

Route::get('create-category', [CategoryController::class, 'create'])->name('category_create');

Route::post('store-category', [CategoryController::class, 'store'])->name('category_store');
