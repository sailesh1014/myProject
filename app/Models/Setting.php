<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $guarded = ['id'];
    protected $dates = ['created_at','updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d', // Change your format
        'updated_at' => 'datetime:Y-m-d',
    ];

    public static function getCachedValue(){
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('key', 'name');
        });
    }

    public static function updateCachedSettingsData(){
        Cache::forget('settings');
        self::getCachedValue();
    }
}
