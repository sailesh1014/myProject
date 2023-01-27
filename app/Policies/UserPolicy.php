<?php
declare(strict_types=1);

namespace App\Policies;

use App\Http\Traits\InitialPermissionCheck;
use App\Models\User;
use App\Services\PermissionService;
use App\Services\UserService;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization, InitialPermissionCheck;
    public function __construct(protected PermissionService $permissionService,protected UserService $userService){
    }

    public function before(User $user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }


    public function viewAny(User $user):bool
    {
        return true;
    }


    public function view(User $user, User $model):bool
    {
        return true;
    }

    public function create(User $user):bool
    {
        return true;
    }


    public function update(User $user, User $model):bool
    {
        dd('test');
        if(!$this->initialCheck($user,$model)) return false;
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('user-update');
        return in_array($user->role->key, $authorizedRoles);
    }


    public function delete(User $user, User $model):bool
    {
        if(!$this->initialCheck($user,$model)) return false;
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('user-delete');
        return in_array($user->role->key, $authorizedRoles);
    }


    public function restore(User $user, User $model):bool
    {
        return true;

    }


    public function forceDelete(User $user, User $model):bool
    {
        return true;
    }
}
