<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Http\Resources\UserResource;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class RoleService {

    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getRoleByName(string $name)
    {
        return $this->roleRepository->getRoleByName($name);
    }

    public function allRoles(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->roleRepository->all();
    }


}
