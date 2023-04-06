<?php
declare( strict_types = 1 );

use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\GenreController;
use App\Http\Controllers\Dashboard\IndexController as DashboardController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Front\ArtistController;
use App\Http\Controllers\Front\ClubController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\GenreController as FrontGenreController;
use App\Http\Controllers\Front\IndexController as FrontController;
use App\Http\Controllers\Front\InvitationController;
use App\Http\Controllers\Front\PaymentController;
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

Route::group(['middleware' => ['auth', 'verified']], function()
{
     Route::get('/email-verified', [FrontController::class, 'emailVerified']);
     Route::get('/select-genre', [FrontGenreController::class, 'index'])->name('front.select-genre');
     Route::post('/select-genre', [FrontGenreController::class, 'store'])->name('front.store-genre');
     Route::post('/checkout', [PaymentController::class, 'checkout'])->name('front.checkout.verify');

     Route::group(['middleware' => ['genre']], function()
     {
          Route::get('/home', [FrontController::class, 'home'])->name('front.home');
          Route::get('/artist/{artist_id}', [ArtistController::class, 'artistDetail'])->name('front.artist.detail');
         Route::get('/club/{club_id}', [ClubController::class, 'clubDetail'])->name('front.club.detail');
         Route::get('/event/{event_id}', [ArtistController::class, 'eventDetail'])->name('front.event.detail');

          Route::get('/invitations/{event_id}/{user_id}/{action}', [InvitationController::class, 'invitationAction'])->name('invitation.artist.action')->middleware('signed');

     });

});


Route::group(['middleware' => ['auth', 'verified', 'genre', 'canAccessDashboard']], function()
{
     Route::group(['prefix' => 'dashboard'], function()
     {
          //        Route::get('/invitations/{event_id}/{user_id}/accept', [\App\Http\Controllers\Front\InvitationController::class, 'accept'])->name('invitations.accept');
          Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
          Route::post('/events/{event}/invite-artist', [EventController::class, 'inviteArtist'])->name('events.inviteArtist');


          Route::resource('events', EventController::class);

          Route::group(['middleware' => 'isAdmin'], function()
          {
               Route::resource('genres', GenreController::class);
               Route::resource('roles', RoleController::class);
               Route::resource('settings', SettingController::class)->only(['index', 'store']);
               Route::resource('users', UserController::class);
               Route::put('users/update-password/{user}', [UserController::class, 'updatePassword'])->name('users.update-password');
          });
     });
});

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::group(['middleware' => 'guest'], function()
{
     Route::post('/register/role', [AuthController::class, 'saveRole'])->name('register.role');
     Route::get('/register/user', [AuthController::class, 'createUser'])->name('register.user');
});

