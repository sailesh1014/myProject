<?php
declare(strict_types = 1);

namespace App\Notifications;

use App\Helpers\AppHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ArtistInvitation extends Notification
{
    use Queueable;

    public function __construct(protected $event)
    {
    }

    public function via() : array
    {
        return ['database'];
    }

    public function toArray() : array
    {
        return [
             'event_thumbnail' => $this->event->thumbnail,
             'event_id' => $this->event->id,
             'message'   => "New invitation from ".ucwords($this->event->club->name),
             'event_title' => $this->event->title,
             'event_date' => $this->event->event_date,
             'accept_url'       => $this->event->accept_url,
             'reject_url'       => $this->event->reject_url
        ];
    }
}
