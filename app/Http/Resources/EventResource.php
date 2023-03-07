<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Constants\EventStatus;
use App\Helpers\AppHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource {

    public function toArray($request): array
    {

        return [
            'id'        =>  $this->id,
            'title'      => ucwords($this->title),
            'thumbnail'  => "<img class='img-fluid hi-index-img' src='" . asset('storage/uploads/' . $this->thumbnail) . "'/>",
            'event_date' => AppHelper::formatDate($this->event_date, 'Y-m-d h:i A'),
            'status'     => $this->status === EventStatus::PUBLISHED ? info_pill($this->status) : danger_pill($this->status),
            'created_at' => AppHelper::formatDate($this->created_at),
            'action'     => \View::make('dashboard.events._action')->with('r', $this)->render(),
        ];
    }
}
