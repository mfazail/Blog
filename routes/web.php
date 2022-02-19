<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/ip', function(){
    return request()->ip();
});
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [AdminController::class, 'contact'])->name('contact.support');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post');
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('category');
Route::get('/error', function () {
    return "error";
})->name('error');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/new_post', [AdminController::class, 'newPost'])->name('new_post');
    Route::post('/upload_image', [PostController::class, 'image'])->name('upload_image');
    Route::post('/upload_post', [PostController::class, 'store'])->name('upload_post');
});
