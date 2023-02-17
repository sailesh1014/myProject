<?php

use App\Constants\UserRole;

if (!function_exists('p')) {
    function p($r): void
    {
        echo '<pre>';
        print_r($r);
        echo '</pre>';
    }
}

if (!function_exists('pe')) {
    function pe($r): void
    {
        echo '<pre>';
        print_r($r);
        echo '</pre>';
        exit();
    }
}


if (!function_exists('current_page')) {
    function current_page($active = '/'): bool
    {
        $current = request()->segment(2);
        if(is_array($active)){
            foreach($active as $ak => $av){
                if(!strcasecmp($current,$av)){
                    return true;
                };
            }
        }else{
            return !strcasecmp($current, $active);
        }
        return false;
    }
}

if(!function_exists('get_homePage')){
    function get_user_home_page(): string{
        $user = auth()->user();
        if(!$user){abort('401');}
        return route('front.home');
        //return in_array($user->role->key, UserRole::ADMIN_LIST) ? route('dashboard.index') : route('front.home');
    }
}

if(!function_exists('danger_pill')){
    function danger_pill(string $pill): string{
        return  "<span class='badge badge-danger'>{$pill}</span>";
    }
}

if(!function_exists('success_pill')){
    function success_pill(string $pill): string{
        return  "<span class='badge badge-success'>{$pill}</span>";
    }
}

if(!function_exists('info_pill')){
    function info_pill(string $pill): string{
        return  "<span class='badge badge-info'>{$pill}</span>";
    }
}


