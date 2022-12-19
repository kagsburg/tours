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
})->middleware('guest');
Route::get('/home', function () {
    return view('home.index');
});
Route::get('/about', function () {
    return view('home.about');
})->middleware('guest');



Route::get('/contact', function () {
    return view('home.contact');
})->middleware('guest');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');
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
