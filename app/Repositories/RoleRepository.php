<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Permission;
use App\Models\Role;


class RoleRepository extends BaseRepository implements RoleRepositoryInterface {

    protected $model;

    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function paginatedWithQuery($meta, $query = null): array
    {
        $query = \DB::table('roles as r')
            ->select(
                'r.id',
                'r.name',
                'r.description',
                'r.created_at'
            );
        $query->where(function ($q) use ($meta) {
            $q->orWhere('r.description', 'like', '%' . $meta['search'] . '%')
                ->orWhere('r.name', 'like', $meta['search'] . '%')
                ->orWhere('r.created_at', 'like', $meta['search'] . '%');
        });

        return $this->offsetAndSort($query, $meta);
    }

    public function getRolePermissions(int|string $roleId): array
    {
        if ($roleId == "") return [];

        $permissions = \DB::table('permission_role')
            ->select('key')
            ->join('permissions', 'permissions.id', 'permission_role.permission_id')
            ->where('permission_role.role_id', $roleId)->get()->toArray();

        return array_column($permissions, 'key');
    }

    public function getRoleByKey(string $key)
    {
        return $this->model->where('key', $key)->first();
    }

    public function syncPermissions(Role $role, array $permissionIds)
    {
        $role->permissions()->sync($permissionIds);
    }
}
