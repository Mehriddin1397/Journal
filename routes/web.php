<?php

use Illuminate\Support\Facades\Route;


Route::get('/',[\App\Http\Controllers\PageController::class,'main'])->name('main');
Route::get('/contact',[\App\Http\Controllers\PageController::class,'contact'])->name('contact');
Route::get('/joural',[\App\Http\Controllers\PageController::class,'joural'])->name('joural');


Route::get('/tez', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/tez', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

Route::get('/verify-code', [\App\Http\Controllers\AuthController::class, 'showVerifyForm'])->name('verify.code.form');
Route::post('/verify-code', [\App\Http\Controllers\AuthController::class, 'verifyCode'])->name('verify.code');

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [\App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('news', \App\Http\Controllers\NewsController::class);
    Route::resource('authors', \App\Http\Controllers\AuthorController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
});
