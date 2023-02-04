<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Constants\EventStatus;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest {


    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:191'],
            'excerpt'     => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'thumbnail'   => ['required', 'image', 'max:2048'],
            'event_date'  => ['required', 'date', 'after_or_equal:tomorrow'],
            'fee'         => ['required', 'numeric'],
            'status'      => ['required', 'string', 'in:' . EventStatus::DRAFT . ',' . EventStatus::PUBLISHED],
            'image.*'     => ['nullable', 'image', 'max:2048'],
        ];
    }

}
