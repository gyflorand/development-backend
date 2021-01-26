<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
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

Route::get(
	'/',
	function () {
		return view('welcome');
	}
);

Route::get('/posts/{slug}', [PostsController::class, 'show']);
Route::get('/about', [AboutController::class, 'show']);

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticlesController::class, 'store'])->name('articles.store');
Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticlesController::class, 'update'])->name('articles.update');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contacts.store');
