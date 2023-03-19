<?php

namespace App\Constants;

class PreferenceType {

    const SOLO = 'solo';

    const BAND = 'band';

    const ANY         = 'any';


    public const LIST = [
        self::SOLO => 'Solo',
        self::BAND => 'Band',
        self::ANY  => 'any',
    ];
}
