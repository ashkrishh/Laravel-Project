<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostController;

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

Route::get('/', [SessionController::class,'index'])->name('login')->middleware('guest');
Route::resource('sessions', SessionController::class)->except(['edit', 'show']);

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});

