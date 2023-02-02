<?php
declare(strict_types=1);

namespace App\Services;

use App\Constants\UserRole;
use App\Helpers\AppHelper;
use App\Http\Resources\RoleResource;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
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
        if (isset($input['permissions']))
        {
            $permissionRepository = resolve(PermissionRepositoryInterface::class);
            $permissionIds = $permissionRepository->getPermissionIdByKey($input['permissions']);
            self::syncPermission($role, $permissionIds);
        }

        return $role;
    }

    public function updateRole(array $input, $role): void
    {
        $input['key'] = (string) Str::of(strtolower($input['name']))->camel();
        $role = $this->roleRepository->update($input, $role);
        if (isset($input['permissions']))
        {
            $permissionRepository = resolve(PermissionRepositoryInterface::class);
            $permissionIds = $permissionRepository->getPermissionIdByKey($input['permissions']);
            self::syncPermission($role, $permissionIds);
        }
    }

    public function deleteRole(Role $role): void
    {
        $this->roleRepository->delete($role);
        //if ($role->preserved == 'yes') {
        //    return response()->json([
        //        'message' => 'This Role cannot be deleted',
        //    ], 403);
        //} else {
        //    $role->delete();
        //    return response()->json([
        //        'message' => 'User Successfully Deleted',
        //    ], 200);
        //}
    }

    public function syncPermission($role, array $permissionIds): void
    {
        $this->roleRepository->syncPermissions($role, $permissionIds);
    }

    public function getRolePermissions(int|string $roleId): array
    {
        return $this->roleRepository->getRolePermissions($roleId);
    }

    public function getRoleByKey(string|array $key)
    {
        return $this->roleRepository->getRoleByKey($key);
    }


    public function allRoles(): Collection
    {
        return $this->roleRepository->all();
    }

    //public function getPreservedRoles(bool $includeAdminRoles = true): array
    //{
    //    $preservedRoles = $this->roleRepository->getPreservedRoles()->pluck('name', 'key')->toArray();
    //    if ($includeAdminRoles)
    //    {
    //        $adminRoles = $this->roleRepository->getRoleByKey(UserRole::ADMIN_LIST)->pluck('name', 'key')->toArray();
    //        return  array_merge($preservedRoles,$adminRoles);
    //    }
    //    return $preservedRoles;
    //}

    public function getPublicRoles(bool $includeAdmin = false)
    {
        $preservedRoles = $this->roleRepository->getPublicRoles()->pluck('name', 'key')->toArray();
        if (!$includeAdmin)
        {
            $adminList = UserRole::ADMIN_LIST;
            array_walk($adminList, function ($key, $value) use(&$preservedRoles){
                unset($preservedRoles[$key]);
            });
        }
        return $preservedRoles;
    }


}
