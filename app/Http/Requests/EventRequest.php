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
            'thumbnail'   => ['required_without:thumbnail_hidden_value', 'mimes:jepg,png,jpg', 'max:2048'],
            'location'    => ['required', 'string', 'max:191'],
            'event_date'  => ['required', 'date', 'after_or_equal:tomorrow'],
            'fee'         => ['required', 'numeric'],
            'status'      => ['required', 'string', 'in:' . EventStatus::DRAFT . ',' . EventStatus::PUBLISHED],
            'images.*'     => ['nullable', 'mimes:jepg,png,jpg', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'thumbnail.required_without'       => 'The thumbnail field is required.'
        ];
    }

}
