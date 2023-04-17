<?php
declare( strict_types = 1 );

namespace App\Notifications;

use App\Helpers\AppHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InvitationRequest extends Notification
{

     use Queueable;

     public function __construct(protected $artist, protected $event){}

     public function via() : array
     {
          return ['database'];
     }

     public function toArray() : array
     {
          return [
               'artist_thumbnail' => $this->artist->thumbnail,
               'artist_id'        => $this->artist->id,
               'message'          => "New invitation request from ".ucwords($this->artist->user_name),
               'event_title'      => $this->event->title,
               'event_id'         => $this->event->id,
               'accept_url'       => $this->event->accept_url,
               'reject_url'       => $this->event->reject_url
          ];
     }

}
