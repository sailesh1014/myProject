<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Setting extends Model {

    use HasFactory;

    protected const SETTING_SESSION_KEY = 'settings';

    protected $table   = 'settings';
    protected $guarded = ['id'];
    protected $dates   = ['created_at', 'updated_at'];


    protected $casts = [
        'created_at' => 'datetime:Y-m-d', // Change your format
        'updated_at' => 'datetime:Y-m-d',
    ];

    public static function getCachedValue()
    {
        return Cache::rememberForever(self::SETTING_SESSION_KEY, function () {
            return Setting::pluck('key', 'name');
        });
    }

    public static function updateCachedSettingsData()
    {
        Cache::forget(self::SETTING_SESSION_KEY);
        self::getCachedValue();
    }
}
