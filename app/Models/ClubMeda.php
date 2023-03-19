<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClubMeda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }
}
