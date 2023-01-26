<?php
declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Role;

interface RoleRepositoryInterface {

    public function paginatedWithQuery($meta, $query = null);

    public function getRolePermissions(int|string $roleId): array;

    public function getRoleByKey(string|array $key);

    public function syncPermissions(Role $role, array $permissionIds);

    public function getPreservedRoles();

    public function getPublicRoles();

}
