<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/blog/{id}', [App\Http\Controllers\AboutController::class, 'show'])->name('blog.show');
Route::get('/category/{id}', [App\Http\Controllers\AboutController::class, 'category'])->name('category.show');



Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('admin/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::get('admin/categories', function () {
    return view('admin.category');
})->name('admin.categories.index');
Route::get('/blog', function () {
    return view('home.blog');
})->name('blog');

Route::get('admin/articles/add',[App\Http\Controllers\ArticleController::class, 'addarticle'])->name('addarticle');
Route::post('/articles/store',[App\Http\Controllers\ArticleController::class, 'store'])->name('storearticle');
