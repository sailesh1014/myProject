<?php
declare( strict_types = 1 );

namespace App\Http;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EnsureUserCanAccessDashboard;
use App\Http\Middleware\EnsureUserHasGenre;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsureUserIsOrganizer;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\ValidateSignature;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Session\Middleware\AuthenticateSession;

class Kernel extends HttpKernel
{

     protected $middleware = [
          \App\Http\Middleware\TrustProxies::class,
          \Illuminate\Http\Middleware\HandleCors::class,
          \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
          \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
          \App\Http\Middleware\TrimStrings::class,
          \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
     ];

     protected $middlewareGroups = [
          'web' => [
               \App\Http\Middleware\EncryptCookies::class,
               \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
               \Illuminate\Session\Middleware\StartSession::class,
               \Illuminate\View\Middleware\ShareErrorsFromSession::class,
               \App\Http\Middleware\VerifyCsrfToken::class,
               \Illuminate\Routing\Middleware\SubstituteBindings::class,
          ],

          'api' => [
               'throttle:api',
               \Illuminate\Routing\Middleware\SubstituteBindings::class,
          ],
     ];

     protected $routeMiddleware = [
          'auth'               => Authenticate::class,
          'auth.basic'         => AuthenticateWithBasicAuth::class,
          'auth.session'       => AuthenticateSession::class,
          'cache.headers'      => SetCacheHeaders::class,
          'can'                => Authorize::class,
          'guest'              => RedirectIfAuthenticated::class,
          'password.confirm'   => RequirePassword::class,
          'signed'             => ValidateSignature::class,
          'throttle'           => ThrottleRequests::class,
          'verified'           => EnsureEmailIsVerified::class,
          'genre'              => EnsureUserHasGenre::class,
          'isAdmin'            => EnsureUserIsAdmin::class,
          'isOrganizer'        => EnsureUserIsOrganizer::class,
          'canAccessDashboard' => EnsureUserCanAccessDashboard::class,
     ];

}
