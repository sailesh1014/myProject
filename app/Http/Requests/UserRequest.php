<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest {

    use PasswordValidationRules;

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        /* TODO: Change max and min genre count from config or setting */
        $maxGenreCount = env('MAX_USER_GENRE_COUNT');
        $minGenreCount = env('MIN_USER_GENRE_COUNT');
        return [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name'  => ['required', 'string', 'max:191'],
            'email'      => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password'   => $this->passwordRules(),
            'role'       => ['required', 'string', 'exists:roles,name'],
            'genres'     => ['required', 'array', "min:$minGenreCount", "max:$maxGenreCount"],
            'genres.*'   => ['string', 'exists:genres,name'],
        ];
    }

    public function messages()
    {
        return [
            'role.required' => 'Select least one role',
        ];
    }
}
