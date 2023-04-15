<?php
declare(strict_types = 1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
         return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
