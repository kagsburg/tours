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
});

Route::get('/about', function () {
    return view('home.about');
});



Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('admin/articles', function () {
    return view('admin.article');
});
Route::get('admin/categories', function () {
    return view('admin.category');
});
Route::get('/blog', function () {
    return view('home.blog');
});
