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

    public function getRolesByPermissionKey(string $key): array{
        $permission = $this->model->with('roles')->where('key', $key)->first();
        return $permission->roles->pluck('key')->toArray();
    }

    public function getGroupedPermissions(): array
    {
        $permissions = $this->model->all();
        $search_arr = ['-view', '-create', '-update', '-delete','-'];
        $permissions->each(function ($val, $key) use ($search_arr) {
            return $val->labelGroup = ucwords(str_replace($search_arr, "", $val->key));
        });
        return $permissions->groupBy('labelGroup')->sortKeys()->toArray();
    }


    public function getPermissionByKey(string|array $key): array|string {
        if(is_array($key)){
            return $this->model->whereIn('key', $key)->pluck('key')->toArray();
        }
        return $this->model->where('key', $key)->first()->key;
    }
}
