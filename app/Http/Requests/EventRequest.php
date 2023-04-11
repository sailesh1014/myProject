<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Constants\EventStatus;
use App\Constants\PreferenceType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest {


    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $allowed_video_types = ['mp4', 'mkv'];
        $allowed_image_types = ['png', 'jpeg', 'jpg'];

        $validationArr = [
            'title'       => ['required', 'string', 'max:191'],
            'excerpt'     => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'thumbnail'   => ['required_without:thumbnail_hidden_value', 'mimes:jepg,png,jpg', 'max:5120'],
            'event_date'  => ['nullable', 'date_format:Y-m-d H:i', 'after_or_equal:tomorrow'],
            'fee'         => ['required', 'numeric'],
            'status'      => ['nullable', 'string', 'in:' . EventStatus::DRAFT . ',' . EventStatus::PUBLISHED],
            'preference'  => ['nullable', 'string', 'in:' . implode(',', array_keys(PreferenceType::LIST))],
            'media' => [
                'nullable',
                'array',
            ],
            'media.*' => [
                'nullable',

                function ($attribute, $value, $fail) use ($allowed_video_types, $allowed_image_types) {
                    $allowed_types = array_merge($allowed_video_types, $allowed_image_types);

                    if (!in_array($value->getClientOriginalExtension(), $allowed_types)) {
                        $fail('The file must be a video or image file.');
                    }

                    if (in_array($value->getClientOriginalExtension(), $allowed_video_types)) {
                        if (!in_array($value->getClientMimeType(), ['video/mp4', 'video/x-matroska'])) {
                            $fail('The video file must be a MP4, MKV.');
                        }
                    }
                },
                'max:30720'
            ],
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
