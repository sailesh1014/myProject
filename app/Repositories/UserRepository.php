<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function paginatedWithQuery($meta, $query = null ): array
    {
        $query = \DB::table('users as u')
            ->join('roles as r', 'r.id', 'u.role_id')
            ->select(
                'u.id',
                'u.first_name',
                'u.last_name',
                'u.role_id',
                'u.email',
                'u.created_at',
                'r.name as role'
            );
        $query->where(function($q) use($meta){
            $q->orWhere('u.first_name', 'like', $meta['search'] . '%')
                ->orWhere('u.last_name', 'like', $meta['search'] . '%')
                ->orWhere('u.email', 'like', $meta['search'] . '%')
                ->orWhere('r.name', 'like', $meta['search'] . '%')
                ->orWhere('u.created_at', 'like', $meta['search'] . '%');
        });
        return $this->offsetAndSort($query, $meta);
    }

}
