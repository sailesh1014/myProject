<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Setting extends Model {

    use HasFactory;

    public const SETTING_SESSION_KEY = 'settings';

    protected $table   = 'settings';
    protected $guarded = ['id'];
    protected $dates   = ['created_at', 'updated_at'];


    protected $casts = [
        'created_at' => 'datetime:Y-m-d', // Change your format
        'updated_at' => 'datetime:Y-m-d',
    ];

    public const SETTINGS_FIELD = [
        'app_name', 'admin_email', 'app_logo', 'app_address', 'app_phone', 'facebook_url', 'twitter_url', 'instagram_url', 'app_max_genre_count', 'app_min_genre_count',
    ];


}
