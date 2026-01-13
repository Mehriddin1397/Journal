<?php

use App\Http\Controllers\ArticleRequestController;
use Illuminate\Support\Facades\Route;


Route::get('/',[\App\Http\Controllers\PageController::class,'main'])->name('main');
Route::get('/contact',[\App\Http\Controllers\PageController::class,'contact'])->name('contact');
Route::get('/joural',[\App\Http\Controllers\PageController::class,'joural'])->name('joural');
Route::get('/new_journal',[\App\Http\Controllers\PageController::class,'new_journal'])->name('new_journal');
Route::post('/article-request', [ArticleRequestController::class, 'store'])->name('article-request.store');

Route::get('/new/{id}', [\App\Http\Controllers\PageController::class, 'new_show'])->name('new.show');


// Admin panel uchun




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
    Route::resource('jurnalissues', \App\Http\Controllers\JournalIssueController::class);
    Route::resource('articles', \App\Http\Controllers\ArticleController::class);
    Route::resource('journal_issues', \App\Http\Controllers\JournalIssuesController::class);



    Route::get('/admin/article-requests', [ArticleRequestController::class, 'index'])->name('article-requests.index');
    Route::get('/admin/article-requests/{id}', [ArticleRequestController::class, 'show'])->name('article-requests.show');
    Route::delete('/admin/article-requests/{id}', [ArticleRequestController::class, 'destroy'])->name('article-requests.destroy');
    Route::get('/admin/article-requests/{id}/read', [ArticleRequestController::class, 'markAsRead'])
        ->name('article-requests.read');

});
