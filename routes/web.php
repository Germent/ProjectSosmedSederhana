<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TimeLineController;
use App\Http\Controllers\Post\ShowPostController;
use App\Http\Controllers\Post\StorePostController;
use App\Http\Controllers\Post\StoreCommentController;
use App\Http\Controllers\Post\DeleteCommentController;

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
    return view('welcome');
});



Route::get('/dashboard', TimeLineController::class)->middleware(['auth'])->name('dashboard');

Route::post('post', StorePostController::class)->middleware('checkBlacklist')->name('post.store');
Route::get('post/{post}', ShowPostController::class)->name('post.show');
Route::post('post/{post}/comment', StoreCommentController::class)->middleware('checkBlacklist')->name('post.comment.store');
Route::delete('post/{post}/comment/{comment}', DeleteCommentController::class)->name('post.comment.destroy');

require __DIR__.'/auth.php';
