<?php
declare(strict_types=1);

namespace App\Interfaces;

interface PermissionRepositoryInterface {

    public function getRolesByPermissionKey(string $key): array;

    public function getGroupedPermissions(): array;

}
