<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Helpers\AppHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class GenreResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'title'      => ucwords($this->name),
            'symbol'     => "<img class='img-fluid hi-index-img' src='" . asset('storage/uploads/' . $this->symbol) . "'/>",
            'created_at' => AppHelper::formatDate($this->created_at),
            'action'     => \View::make('dashboard.genres._action')->with('r', $this)->render(),
        ];
    }
}
