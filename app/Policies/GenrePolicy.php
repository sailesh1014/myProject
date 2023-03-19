<?php

namespace App\Policies;

use App\Models\User;
use App\Services\PermissionService;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenrePolicy
{
    use HandlesAuthorization;

    public function __construct(protected PermissionService $permissionService) {}

    public function before(User $user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }


    public function view(User $user): bool
    {
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('genre-view');
        return in_array($user->role->key, $authorizedRoles);
    }

    public function create(User $user): bool
    {
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('genre-create');
        return in_array($user->role->key, $authorizedRoles);
    }

    public function update(User $user): bool
    {
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('genre-update');
        return in_array($user->role->key, $authorizedRoles);
    }


    public function delete(User $user): bool
    {
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('genre-delete');
        return in_array($user->role->key, $authorizedRoles);
    }


    public function restore(User $user): bool
    {
        return true;
    }

}
