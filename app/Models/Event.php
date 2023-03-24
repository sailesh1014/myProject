<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $date = ['created_at', 'updated_at', 'event_date'];

    // Local Scope
     public function scopePublished($query)
     {
          return $query->where('status', 'published');
     }

    public function eventMedia(): HasMany
    {
        return $this->hasMany(EventMedia::class);
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function invitations(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'invitation_user')->withPivot('status', 'type');
    }


}
