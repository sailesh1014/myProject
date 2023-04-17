<?php
declare( strict_types = 1 );

use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\GenreController;
use App\Http\Controllers\Dashboard\IndexController as DashboardController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Front\ArtistController;

use App\Http\Controllers\Front\EventController as FrontEventController;

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


     Route::group(['middleware' => ['genre']], function()
     {
          Route::post('/notifications/mark', [FrontController::class, 'markNotifications'])->name('front.notification.mark');
          // Artist route
          Route::get('/artist/search', [ArtistController::class, 'searchArtist'])->name('front.artist.search');
          Route::post('/artist/event/{id}/apply', [ArtistController::class, 'applyEvent'])->name('artist.event.apply');
          Route::get('/artist/{artist_id}', [ArtistController::class, 'artistDetail'])->name('front.artist.detail');
          Route::put('/artist/{id}/edit', [ArtistController::class, 'editArtist'])->name('front.artist.edit');

          Route::post('/front/feedback', [FrontController::class, 'feedback'])->name('front.feedback');
         Route::get('/event/{event_id}', [FrontEventController::class, 'index'])->name('front.event.detail');
         Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
          Route::put('/user/rate', [FrontController::class, 'rateUser'])->name('front.user.rate');
         Route::get('/club/{club_id}', [ClubController::class, 'clubDetail'])->name('front.club.detail');
          Route::put('/artist/{id}/edit', [ArtistController::class, 'editArtist'])->name('front.artist.edit');
         Route::put('/organizer/{id}/edit', [ClubController::class, 'editClub'])->name('front.club.edit');
         Route::put('/event/{id}/edit', [FrontEventController::class, 'editEvent'])->name('front.event.edit');
          Route::post('/checkout', [PaymentController::class, 'checkout'])->name('front.checkout.verify');
          Route::get('/invitations/{event_id}/{user_id}/{action}', [InvitationController::class, 'invitationAction'])->name('invitation.artist.action')->middleware('signed');
          Route::get('/home', [FrontController::class, 'home'])->name('front.home');

     });

});


Route::group(['middleware' => ['auth', 'verified', 'genre', 'canAccessDashboard']], function()
{
     Route::group(['prefix' => 'dashboard'], function()
     {
          Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
          Route::post('/events/{event}/invite-artist', [EventController::class, 'inviteArtist'])->name('events.inviteArtist');


          Route::resource('events', EventController::class);

          Route::group(['middleware' => 'isAdmin'], function()
          {
               Route::resource('genres', GenreController::class);
               Route::resource('feedbacks', FeedbackController::class)->only(['index', 'delete']);
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

