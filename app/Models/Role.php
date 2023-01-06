<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $guarded = ['id'];

    protected $dates = ['created_at','updated_at'];

    const ADMIN_ROLE = ['superAdmin','admin'];

    public static function getDefaultRoleId()
    {
        return Role::where('name','basicUser')->first()->id;
    }

    /*Relationships*/
    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
