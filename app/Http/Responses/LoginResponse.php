<?php
declare(strict_types=1);

namespace App\Http\Responses;

use App\Constants\UserRole;
use App\Services\RoleService;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract {

    public function toResponse($request): RedirectResponse|Response
    {
        $home = '/dashboard';
        if(auth()->user()->role->key ===  UserRole::BASIC_USER){
            return redirect("/");
        }
        return redirect()->intended($home);
    }
}
