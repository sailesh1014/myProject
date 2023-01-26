<?php
declare(strict_types=1);

namespace App\Models;

use App\Constants\UserRole;
use App\Services\RoleService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model {

    protected static function boot(): void
    {
        parent::boot();
        static::created(function (Model $model) {
            $roleService = resolve(RoleService::class);
            $adminRoles = $roleService->getRoleByKey(UserRole::ADMIN_LIST);
            if(!$adminRoles){return;}
            $adminRoles->each(function ($adminRoles) use ($model){
                $adminRoles->permissions()->attach($model->id);
            });

        });
    }

    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

}
