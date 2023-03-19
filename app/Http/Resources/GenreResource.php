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
            'excerpt'    => $this->excerpt,
            'created_at' => AppHelper::formatDate($this->created_at),
            'action'     => \View::make('dashboard.genres._action')->with('r', $this)->render(),
        ];
    }
}
