<?php
declare(strict_types=1);

namespace App\Interfaces;

interface RoleRepositoryInterface {

    public function getRoleByName(string $name);
}
