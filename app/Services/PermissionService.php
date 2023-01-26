<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\PermissionRepositoryInterface;

class PermissionService {

    public function __construct(protected PermissionRepositoryInterface $permissionRepository)
    {
    }

    public function getRolesByPermissionKey(string|array $key): array|string
    {
        return $this->permissionRepository->getRolesByPermissionKey($key);
    }

}
