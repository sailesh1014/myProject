<?php
namespace  App\Services;

class AuthService {
    const SELECT_ROLE_KEY = 'selected_role_key';

    public function selectedRole(): bool|string{
        $selectedRole = session(self::SELECT_ROLE_KEY);
        if(!$selectedRole){
            return 0;
        }
        return $selectedRole;
    }

    public function saveRole($role): void{
        session([self::SELECT_ROLE_KEY => $role]);
    }

    public function forgetRole(): void{
        session()->forget(self::SELECT_ROLE_KEY);
    }
}
