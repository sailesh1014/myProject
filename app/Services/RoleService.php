<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Http\Resources\RoleResource;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Repositories\PermissionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleService {

    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function paginateWithQuery(array $input): array
    {
        $columns = [
            'name',
            'description',
            'created_at',
            'action',
        ];
        $meta = AppHelper::defaultTableInput($input, $columns);
        $resp = $this->roleRepository->paginatedWithQuery($meta);

        return [
            'data' => RoleResource::collection($resp['results']),
            'meta' => $resp['meta'],
        ];
    }

    public function getGroupedPermissions(): array
    {
        $permissionRepository = resolve(PermissionRepositoryInterface::class);

        return $permissionRepository->getGroupedPermissions();
    }

    public function findRoleOrCreate(array $condition, array $data)
    {
        return $this->roleRepository->firstOrCreate($condition, $data);
    }

    public function createNewRole(array $input): object
    {
        $input['key'] = (string) Str::of(strtolower($input['name']))->camel();
        $role = $this->roleRepository->store($input);
        if(isset($input['permissions'])){
            $permissionRepository = resolve(PermissionRepositoryInterface::class);
            $permissionIds = $permissionRepository->getPermissionsIdByKey($input['permissions']);
            self::syncPermission($role, $permissionIds);
        }
        return $role;
    }

    public function syncPermission($role, array $permissionIds): void
    {
        $this->roleRepository->syncPermissions($role, $permissionIds);
    }

    public function getRolePermissions(int|string $roleId): array
    {
        return $this->roleRepository->getRolePermissions($roleId);
    }

    public function getRoleByKey(string $key)
    {
        return $this->roleRepository->getRoleByKey($key);
    }

    public function allRoles(): Collection
    {
        return $this->roleRepository->all();
    }


}
