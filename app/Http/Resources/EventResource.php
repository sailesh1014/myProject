<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Helpers\AppHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource {

    public function toArray($request): array
    {
        $eventStatus = "";
        switch ($this->status)
        {
            case \App\Constants\EventStatus::PUBLISHED:
                $eventStatus = info_pill($this->status);
                break;
            case \App\Constants\EventStatus::DRAFT:
                $eventStatus = danger_pill($this->status);
                break;
            case \App\Constants\EventStatus::FINISHED:
                $eventStatus = success_pill($this->status);
        }

        return [
            'id'        =>  $this->id,
            'title'      => ucwords($this->title),
            'thumbnail'  => "<img class='img-fluid hi-index-img' src='" . asset('storage/uploads/' . $this->thumbnail) . "'/>",
            'event_date' => AppHelper::formatDate($this->event_date, 'Y-m-d h:i A'),
            'status'     => $eventStatus,
            'created_at' => AppHelper::formatDate($this->created_at),
            'action'     => \View::make('dashboard.events._action')->with('r', $this)->render(),
        ];
    }
}
