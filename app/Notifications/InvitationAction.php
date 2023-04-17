<?php
declare( strict_types = 1 );

namespace App\Notifications;

use App\Helpers\AppHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InvitationAction extends Notification
{

     use Queueable;

     public function __construct(protected $message){}

     public function via() : array
     {
          return ['database'];
     }

     public function toArray() : array
     {
          return ['message' => $this->message];
     }

}
