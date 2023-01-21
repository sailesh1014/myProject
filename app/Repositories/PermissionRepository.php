<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;


class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface {

    protected $model;

    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    public function getGroupedPermissions(): array
    {
        $permissions = $this->model->all();
        $search_arr = ['-view', '-create', '-update', '-destroy','-'];
        $permissions->each(function ($val, $key) use ($search_arr) {
            return $val->labelGroup = ucwords(str_replace($search_arr, "", $val->key));
        });
        return $permissions->groupBy('labelGroup')->sortKeys()->toArray();
    }
}
