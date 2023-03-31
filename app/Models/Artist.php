<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artist extends Model
{
    use HasFactory;
    public function invitation(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'invitation_user')->withPivot('status', 'type');
    }
}
