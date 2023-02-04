<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Constants\UserRole;
use Closure;
use Illuminate\Http\Request;

class EnsureUserCanAccessDashboard
{

    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        return in_array($user->role->key, [...UserRole::ADMIN_LIST, UserRole::ORGANIZER]) ? $next($request) :  abort(401);;
    }
}
