<?php
declare(strict_types=1);

use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Front\GenreController;
use App\Http\Controllers\Front\IndexController as FrontController;

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

Route::get('/', function () { return view('welcome'); });
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/email-verified', [FrontController::class, 'emailVerified']);
    Route::get('/select-genre', [GenreController::class, 'index'])->name('front.select-genre');
    Route::post('/select-genre', [GenreController::class, 'store'])->name('front.store-genre');
});

Route::group(['middleware' => ['auth', 'verified', 'genre']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [IndexController::class, 'index'])->name('dashboard.index');
        Route::resource('users', UserController::class);
    });
});


Route::get('/', [FrontController::class, 'index'])->name('front.index');
