<?php
declare(strict_types=1);

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function paginatedWithQuery($meta, $query = null );
}
