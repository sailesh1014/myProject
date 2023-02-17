<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Constants\EventStatus;
use App\Constants\PreferenceType;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest {


    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $validationArr = [
            'title'       => ['required', 'string', 'max:191'],
            'excerpt'     => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'thumbnail'   => ['required_without:thumbnail_hidden_value', 'mimes:jepg,png,jpg', 'max:5120'],
            'event_date'  => ['required', 'date_format:Y-m-d H:i', 'after_or_equal:tomorrow'],
            'fee'         => ['required', 'numeric'],
            'status'      => ['required', 'string', 'in:' . EventStatus::DRAFT . ',' . EventStatus::PUBLISHED],
            'images.*'    => ['nullable', 'mimes:jepg,png,jpg', 'max:30720'],
            'preference'  => ['required', 'string', 'in:' . implode(',', array_keys(PreferenceType::LIST))],
        ];
        if (auth()->user()->isAdmin())
        {
            $validationArr['club_id'] = ['required', 'string', 'exists:clubs,id'];
        }

        return $validationArr;
    }

    public function messages(): array
    {
        return [
            'thumbnail.required_without' => 'The thumbnail field is required.',
        ];
    }

}
