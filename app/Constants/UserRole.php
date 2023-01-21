<?php

namespace App\Constants;

class UserRole {

    const ADMIN = 'admin';

    const BASIC_USER = 'basicUser';

    const SUPER_ADMIN = 'superAdmin';

    const ARTIST = 'artist';

    const ORGANIZER = 'organizer';

    const ADMIN_LIST = [self::SUPER_ADMIN, self::ADMIN];

    public const LIST = [
        self::ADMIN       => [
            'name' => 'Admin',
            'key'  => self::ADMIN,
        ],
        self::BASIC_USER  => [
            'name' => 'Basic User',
            'key'  => self::BASIC_USER,
        ],
        self::SUPER_ADMIN => [
            'name' => 'Super Admin',
            'key'  => self::SUPER_ADMIN,
        ],
        self::ARTIST      => [
            'name' => 'artist',
            'key'  => self::ARTIST,
        ],
        self::ORGANIZER   => [
            'name' => 'organizer',
            'key'  => self::ORGANIZER,
        ],
    ];
}
