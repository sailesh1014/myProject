<?php
declare(strict_types=1);

namespace App\Interfaces;

interface PermissionRepositoryInterface {

    public function getGroupedPermissions();

    public function getPermissionsIdByKey(string|array $key): array|string;

    }
