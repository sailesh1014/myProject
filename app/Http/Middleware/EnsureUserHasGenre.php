<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\UserService;
use Closure;
use Illuminate\Http\Request;

class EnsureUserHasGenre {

    public function handle(Request $request, Closure $next)
    {
        return  $next($request);
//        $user = auth()->user()->loadCount('genres');
//        $userService = resolve(UserService::class);
//        return $user->genres_count || auth()->user()->isAdmin() ? $next($request): redirect(route('front.select-genre')) ;
    }
}
