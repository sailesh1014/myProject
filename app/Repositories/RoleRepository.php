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

    public function paginatedWithQuery($meta, $query = null): array
    {
        $query = \DB::table('roles as r')
            ->select(
                'r.id',
                'r.name',
                'r.description',
                'r.created_at'
            );
        $query->where(function ($q) use ($meta) {
            $q->orWhere('r.description', 'like', '%' . $meta['search'] . '%')
                ->orWhere('r.name', 'like', $meta['search'] . '%')
                ->orWhere('r.created_at', 'like', $meta['search'] . '%');
        });

        return $this->offsetAndSort($query, $meta);
    }

    public function getRolePermissions(int|string $roleId): array
    {
        if ($roleId == "") return [];

        return \DB::table('permission_role')->where('role_id', $roleId)->pluck('permission_id')->toArray();
    }

    public function getRoleByKey(string $key)
    {
        return $this->model->where('key', $key)->first();
    }
}
