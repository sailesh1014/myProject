<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;


class RoleRepository extends BaseRepository implements RoleRepositoryInterface {

    protected $model;

    public function __construct(Role $model)
    {
        parent::__construct($model);
    }


    public function getRoleByName(string $name)
    {
      return $this->model->where('name',$name)->first();
    }
}
