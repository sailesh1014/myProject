<?php
declare(strict_types=1);

namespace App\Http\Traits;

use App\Models\User;

trait InitialPermissionCheck {

    public function initialCheck(User $user, User $model): bool{
        if($model->isSuperAdmin() && !$user->isSuperAdmin()) return false;
        if($model->isAdmin(true) && $user->isAdmin(true) && $model->id !== $user->id) return false;
        return true;
    }
}
