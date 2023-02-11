<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\AuthRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function __construct(protected  AuthService $authService) {}

    public function saveRole(AuthRequest $request): RedirectResponse
    {
        $role = $request->input('role');
        $this->authService->saveRole($role);
        return redirect()->route('register.user')->with('toast.success', "Registering as $role");
    }

    public function createUser(): View|RedirectResponse
    {
        if(!$this->authService->selectedRole()){
            return redirect()->route('register')->with('toast.error', "Please select your role.");
        }
        return view('auth.register');
    }
}
