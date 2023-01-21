<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Http\Resources\RoleResource;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Repositories\PermissionRepository;
use Illuminate\Database\Eloquent\Collection;

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
