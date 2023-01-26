<?php

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


