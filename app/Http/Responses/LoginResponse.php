<?php
declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract {

    public function toResponse($request): RedirectResponse|Response
    {
        $home = '/dashboard';
        return redirect()->intended($home);
    }
}
