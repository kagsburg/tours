<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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
})->name('home')->middleware('guest');
Route::get('/home', function () {
    return view('home.index');
});
Route::get('/about', function () {
    return view('home.about');
})->middleware('guest');


Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/blog/{id}', [App\Http\Controllers\AboutController::class, 'show'])->name('blog.show');
Route::get('/category/{id}', [App\Http\Controllers\AboutController::class, 'category'])->name('category.show');



Route::get('/contact', function () {
    return view('home.contact');
})->name('contact')->middleware('guest');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');
Route::get('admin/articles', function () {
    return view('admin.article');
})->middleware('auth');
Route::get('admin/categories', [CategoryController::class, 'index'])->name('categories')->middleware('auth');
Route::get('/blog', function () {
    return view('home.blog');
});
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenicate',[UserController::class,'authenicate']);
Route::post('/category/add',[CategoryController::class,'store']);
Route::delete('/category/delete/{id}',[CategoryController::class,'delete']);
Route::get('/category/{listing}/edit',[CategoryController::class, 'edit'])->middleware('auth');
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');
Route::put('/categories/update/{id}',[CategoryController::class, 'update'])->middleware('auth');

Route::get('admin/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::get('admin/categories', function () {
    return view('admin.category');
})->name('admin.categories.index');
Route::get('/blog', function () {
    return view('home.blog');
})->name('blog');

Route::get('admin/articles/add',[App\Http\Controllers\ArticleController::class, 'addarticle'])->name('addarticle');
Route::post('/articles/store',[App\Http\Controllers\ArticleController::class, 'store'])->name('storearticle');
