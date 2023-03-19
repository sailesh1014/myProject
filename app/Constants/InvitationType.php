<?php

namespace App\Constants;

class InvitationType {

    const REQUESTED = 'requested';

    const INVITED = 'invited';

    const LIST = [self::REQUESTED, self::INVITED];

}
