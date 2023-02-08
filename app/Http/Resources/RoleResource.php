<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Helpers\AppHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'name'        => ucwords($this->name),
            'description' => $this->description,
            'created_at'  => AppHelper::formatDate($this->created_at),
            'action'      => \View::make('dashboard.roles._action')->with('r', $this)->render(),
        ];
    }
}
