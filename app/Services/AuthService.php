<?php
namespace  App\Services;

class AuthService {

    public function sessionHasSelectedRole(): bool|string{
        $selectedRole = session('selected_role_key');
        if(!$selectedRole){
            return 0;
        }
        return $selectedRole;
    }

    public function saveRole($role): void{
        session(['selected_role_key' => $role]);
    }
}
