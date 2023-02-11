<?php
declare(strict_types=1);

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use App\Services\PermissionService;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;
    public function __construct(protected PermissionService $permissionService) {}

    public function before(User $user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return true;
    }


    public function view(User $user): bool
    {
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('event-view');
        return in_array($user->role->key, $authorizedRoles);
    }

    public function create(User $user): bool
    {
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('event-create');
        return in_array($user->role->key, $authorizedRoles);
    }


    public function update(User $user): bool
    {
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('event-update');
        return in_array($user->role->key, $authorizedRoles);

    }


    public function delete(User $user): bool
    {
        $authorizedRoles = $this->permissionService->getRolesByPermissionKey('event-delete');
        return in_array($user->role->key, $authorizedRoles);
    }


}
