<?php

use App\Http\Controllers\ProfileController;
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

require __DIR__.'/auth.php';
