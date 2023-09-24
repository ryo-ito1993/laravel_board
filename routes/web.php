<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('posts/{post}', [PostController::class, 'show'])->whereNumber('post')->name('post.show');


Route::prefix('posts')
    ->name('post.')
    ->middleware('auth:web')
    ->controller(PostController::class)
    ->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('', 'store')->name('store');
        Route::get('{post}/edit', 'edit')->whereNumber('post')->name('edit');
        Route::put('{post}', 'update')->whereNumber('post')->name('update');
        Route::delete('{post}', 'destroy')->whereNumber('post')->name('destroy');
});

Route::get('posts/{post}/comments/create', [CommentController::class, 'create'])->name('comment.create');
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store');
Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comment.update');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::post('like/{post}', [LikeController::class, 'store'])->name('like.store');
Route::delete('/unlike/{post}',[LikeController::class,'destroy'])->name('like.destroy');

require __DIR__.'/auth.php';
