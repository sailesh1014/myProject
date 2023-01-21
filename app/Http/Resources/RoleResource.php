<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'name'        => ucwords($this->name),
            'description' => $this->description,
            'created_at'  => Carbon::parse($this->created_at)->format('Y-m-d'),
            'action'      => \View::make('dashboard.roles._action')->with('r', $this)->render(),
        ];
    }
}
