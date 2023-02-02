<?php
declare(strict_types = 1);
namespace App\Http\Middleware;
use App\Constants\UserRole;
use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next, $role = UserRole::ADMIN)
    {
        $user = auth()->user();
        $isAdmin = $role !== UserRole::SUPER_ADMIN ? $user->isAdmin() : $user->isSuperAdmin();
        return $isAdmin ? $next($request) : abort(401);
    }
}
