<?php

namespace App\Constants;

class InvitationStatus {

    const PENDING = 'pending';

    const ACCEPTED = 'accepted';

    const REJECTED = 'rejected';

    const LIST = [self::PENDING, self::ACCEPTED, self::REJECTED];

}
