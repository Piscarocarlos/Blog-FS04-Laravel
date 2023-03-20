<?php

use App\Http\Controllers\CarlosController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [WebController::class, 'index'])->name('index');

Route::get('contact-us', [WebController::class, 'showContactView'])->name('contact-us');
Route::post('send-contact', [WebController::class, 'sendContact'])->name('contact');

// Routes categories

Route::get('categories', [CategoryController::class, 'index'])->name('categories');

Route::get('create-category', [CategoryController::class, 'create'])->name('category_create');

Route::post('store-category', [CategoryController::class, 'store'])->name('category_store');
Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('category_edit');
Route::put('update-category/{id}', [CategoryController::class, 'update'])->name('category_update');
Route::delete('delete-category/{id}', [CategoryController::class, 'destroy'])->name('category_delete');

// Routes tests
Route::get('all-tests', [TestController::class, 'index'])->name('test.index');
Route::get('create-test', [TestController::class, 'create'])->name('test.create');
Route::post('store-test', [TestController::class, 'store'])->name('test.store');


Route::resource('posts', PostController::class);

Route::get('detail-post/{id}', [WebController::class, 'detailPost'])->name('post.detail');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('logout', [HomeController::class, 'logout'])->name('logout');
Route::post('store-comment',[PostController::class,'commentStore'])->name('comment.store');