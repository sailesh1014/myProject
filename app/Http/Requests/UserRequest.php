<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use App\Constants\UserRole;
use App\Models\User;
use App\Services\RoleService;
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
        $roleService = resolve(RoleService::class);
        $publicRoles = $roleService->getPublicRoles(includeAdmin: auth()->user()->isSuperAdmin());
        /* TODO: Change max and min genre count from config or setting */
        $maxGenreCount = env('MAX_USER_GENRE_COUNT');
        $minGenreCount = env('MIN_USER_GENRE_COUNT');
        $userId = $this->route('user');
        $rules = [
            'first_name'       => ['required', 'string', 'max:191'],
            'last_name'        => ['required', 'string', 'max:191'],
            'email'            => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($userId)],
            'role'             => ['required', 'string', 'exists:roles,key', Rule::in(array_keys($publicRoles))],
            'genres'           => ['nullable','required_if:role,'.implode(',',array_keys($roleService->getPublicRoles())), 'array', "min:$minGenreCount", "max:$maxGenreCount"],
            'genres.*'         => ['string', 'exists:genres,name'],
            'user_name'        => ['required', 'string', 'max:191', Rule::unique(User::class)],
            'gender'           => ['nullable', 'string', 'in:male,female,others'],
            'address'          => ['required', 'string', 'max:191'],
            'phone'            => ['nullable', 'numeric', 'digits:10'],
            'dob'              => ['nullable', 'date_format:Y-m-d'],
            'club_name'        => ['nullable', 'required_if:role,'.UserRole::ORGANIZER, 'string', 'max:191'],
            'club_address'     => ['nullable', 'required_if:role,'.UserRole::ORGANIZER, 'string', 'max:191'],
            'club_description' => ['nullable', 'string', 'max:255'],
            'established_date' => ['nullable', 'required_if:role,'.UserRole::ORGANIZER, 'date_format:Y-m-d'],
        ];
        //no need to validate during update, because there will be no password field on update
        //there will be another form change password for updating password
        if ($this->isMethod('POST'))
        {
            $rules['password'] = $this->passwordRules();
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'role.required' => 'Select least one role',
        ];
    }
}
