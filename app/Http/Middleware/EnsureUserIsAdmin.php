<?php
declare(strict_types = 1);
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        return $user->isAdmin() ? $next($request) : abort(401);
    }
}
