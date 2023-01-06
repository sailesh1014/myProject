<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email,
            'role'       => $this->role,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'action'     => \View::make('dashboard.users._action')->with('r',$this)->render(),
        ];
    }
}
