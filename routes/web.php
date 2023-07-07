<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/post/createPage');
Route::get('/post/createPage', [PostController::class, 'createPage'])->name('post#createPage');
Route::post('/post/create', [PostController::class, 'create'])->name('post#create');
Route::get('/post/delete/{id}', [PostController::class, 'delete'])->name('post#delete');
Route::get('/post/seeMorePage/{id}', [PostController::class, 'seeMore'])->name('post#seeMore');
Route::get('/post/editPage/{id}', [PostController::class, 'editPage'])->name('post#editPage');
Route::post('/post/update', [PostController::class, 'update'])->name('post#update');
