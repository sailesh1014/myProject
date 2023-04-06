<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\UserService;
use Closure;
use Illuminate\Http\Request;

class EnsureUserHasGenre {

    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user()->loadCount('genres');
        return $user->genres_count || auth()->user()->isAdmin() ? $next($request): redirect(route('front.select-genre')) ;
    }
}
