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

Route::get('/', [App\Http\Controllers\AboutController::class, 'home'])->name('home')->middleware('guest');
Route::get('/home',[App\Http\Controllers\AboutController::class, 'home']);



Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/blog/{id}', [App\Http\Controllers\AboutController::class, 'show'])->name('blog.show');
Route::get('/category/{id}', [App\Http\Controllers\AboutController::class, 'category'])->name('category.show');
Route::post('/subscribe', [App\Http\Controllers\AboutController::class, 'subscribe'])->name('subscribe');
// Route::get('/blog', function () {
//     return view('home.blog');
// })->name('blog');


Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact',[App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index')->middleware('auth');
Route::get('/blog', [App\Http\Controllers\AboutController::class, 'list'])->name('blog');
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenicate',[UserController::class,'authenicate']);
Route::post('/category/add',[CategoryController::class,'store']);
Route::delete('/category/delete/{id}',[CategoryController::class,'delete']);
Route::delete('admin/articles/delete/{listing}',[App\Http\Controllers\ArticleController::class,'delete'])->name('articles.delete')->middleware('auth');
Route::get('/category/{listing}/edit',[CategoryController::class, 'edit'])->middleware('auth');
Route::get('admin/articles/{listing}/edit',[App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit')->middleware('auth');
Route::put('admin/articles/update/{listing}',[App\Http\Controllers\ArticleController::class, 'update'])->name('updatearticle')->middleware('auth');
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');
Route::put('/categories/update/{id}',[CategoryController::class, 'update'])->middleware('auth');
Route::get ('/profile',[UserController::class, 'profile'])->name('profile.show')->middleware('auth');
Route::put('/profile/update/{id}',[UserController::class, 'update'])->name('profile.update')->middleware('auth');
Route::put('/profile/updatepassword/{id}',[UserController::class, 'updatepassword'])->name('profile.updatepassword')->middleware('auth');
Route::get('admin/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles')->middleware('auth');
Route::post('admin/image/upload',[App\Http\Controllers\ArticleController::class, 'uploadArticleImages'])->name('upload');

Route::put('admin/social/{id}',[App\Http\Controllers\SocialController::class, 'store'])->name('admin.socials.update')->middleware('auth');
Route::get('admin/socials', [App\Http\Controllers\SocialController::class, 'index'])->name('socials')->middleware('auth');

Route::get('admin/abouts', [App\Http\Controllers\AboutController::class, 'aboutme'])->name('admin.abouts')->middleware('auth');
Route::put('admin/abouts/{id}',[App\Http\Controllers\AboutController::class, 'updateaboutme'])->name('admin.abouts.update')->middleware('auth');

Route::get('admin/banners', [App\Http\Controllers\BannerController::class, 'index'])->name('admin.banners.index')->middleware('auth');
Route::get('admin/banners/add',[App\Http\Controllers\BannerController::class, 'create'])->name('addbanner')->middleware('auth');
Route::post('/banners/store',[App\Http\Controllers\BannerController::class, 'store'])->name('storebanner')->middleware('auth');
Route::delete('admin/banners/delete/{id}',[App\Http\Controllers\BannerController::class,'delete'])->name('banners.delete')->middleware('auth');
Route::get('admin/banners/{id}/edit',[App\Http\Controllers\BannerController::class, 'edit'])->name('banners.edit')->middleware('auth');
Route::put('admin/banners/update/{id}',[App\Http\Controllers\BannerController::class, 'update'])->name('updatebanner')->middleware('auth');


Route::get('admin/articles/add',[App\Http\Controllers\ArticleController::class, 'addarticle'])->name('addarticle');
Route::post('/articles/store',[App\Http\Controllers\ArticleController::class, 'store'])->name('storearticle');
