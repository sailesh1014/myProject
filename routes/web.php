<?php
declare(strict_types=1);

use App\Http\Controllers\Dashboard\GenreController;
use App\Http\Controllers\Dashboard\IndexController as DashboardController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Front\GenreController as FrontGenreController;
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
    Route::get('/select-genre', [FrontGenreController::class, 'index'])->name('front.select-genre');
    Route::post('/select-genre', [FrontGenreController::class, 'store'])->name('front.store-genre');
});

Route::group(['middleware' => ['auth', 'verified', 'genre']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::group(['middleware' => 'canAccessDashboard'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        });
        Route::group(['middleware' => 'isAdmin'], function () {
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
            Route::put('users/update-password/{user}', [UserController::class, 'updatePassword'])->name('users.update-password');
            Route::resource('genres', GenreController::class);
        });
    });
});


Route::get('/', [FrontController::class, 'index'])->name('front.index');
