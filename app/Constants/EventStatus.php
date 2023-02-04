<?php

namespace App\Constants;

class EventStatus {

    //const TO_BE_REVIEWED = 'to_be_reviewed';

    const DRAFT = 'draft';

    const PUBLISHED = 'published';

    const FINISHED = 'finished';


    public const LIST = [
        //self::TO_BE_REVIEWED,
        self::FINISHED,
        self::DRAFT,
        self::PUBLISHED,
    ];
}
