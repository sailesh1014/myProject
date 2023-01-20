<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GenreResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'title'      => ucwords($this->name),
            'symbol'     => "<img class='img-fluid hi-mw-150' src='".asset('storage/uploads/'.$this->symbol)."'/>",
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'action'     => \View::make('dashboard.genres._action')->with('r', $this)->render(),
        ];
    }
}
