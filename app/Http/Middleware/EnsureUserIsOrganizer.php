<?php
declare(strict_types = 1);
namespace App\Http\Middleware;
use App\Constants\UserRole;
use Closure;
use Illuminate\Http\Request;

class EnsureUserIsOrganizer
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        return  $user->isAdmin() || $user->isOrganizer() ? $next($request) : abort(401);
    }
}
