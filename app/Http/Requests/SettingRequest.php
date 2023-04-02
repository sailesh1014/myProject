<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest {

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'app_name'    => ['required', 'string', 'max:191'],
            'admin_email' => ['required', 'email', 'string', 'max:191'],
            'app_address' => ['required', 'string', 'max:191'],
            'app_phone'   => ['required', 'string', 'max:191'],
            'facebook_url'  => ['required', 'string', 'max:191'],
            'twitter_url'   => ['required', 'string', 'max:191'],
            'instagram_url' => ['required', 'string', 'max:191'],
             'app_max_genre_count' => ['required', 'numeric'],
            'app_min_genre_count' => ['required', 'numeric'],
            'app_logo'      => ['nullable', 'required_without:hidden_logo', 'mimes:jepg,jpg,png', 'max:2048'],
            'hidden_logo'   => ['nullable', 'string', 'max:191'],
        ];
    }

    public function messages()
    {
        return [
            'app_logo.required_without' => 'The app logo field is required.',
            'app_min_genre_count' => 'The min genre count field is required',
            'app_max_genre_count' => 'The max genre count field is required',

        ];
    }
}
