<?php
declare(strict_types=1);

namespace App\Models;

use App\Constants\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail {

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'gender',
        'phone',
        'address',
        'dob',
        'role_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['dob' => 'datetime'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getRole()
    {
        return $this->role->name;
    }

    public function isAdmin($restrictSuperAdmin = false): bool
    {
        $role = $this->role->key;

        return $restrictSuperAdmin ? $role === UserRole::ADMIN : in_array($role, UserRole::ADMIN_LIST);
    }

    public function isSuperAdmin(): bool
    {
        $role = $this->role->key;

        return $role === UserRole::SUPER_ADMIN;
    }

    /* Relationship */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function club(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Club::class);
    }
}
