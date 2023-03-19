<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use App\Constants\PreferenceType;
use App\Constants\UserRole;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
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
        $user = $this->route('user');
        $rules = [
            'first_name'       => ['required', 'string', 'max:191'],
            'last_name'        => ['required', 'string', 'max:191'],
            'email'            => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($user)],
            'role'             => ['required', 'string', 'exists:roles,key', Rule::in(array_keys($publicRoles))],
            'genres'           => ['nullable', 'exclude_if:role,' . implode(',', UserRole::ADMIN_LIST), 'required_if:role,' . implode(',', array_keys($roleService->getPublicRoles())), 'array', "min:$minGenreCount", "max:$maxGenreCount"],
            'genres.*'         => ['string', 'exists:genres,name'],
            'user_name'        => ['required', 'string', 'max:191', Rule::unique(User::class)->ignore($user)],
            'gender'           => ['nullable', 'string', 'in:male,female,others'],
            'address'          => ['required', 'string', 'max:191'],
            'phone'            => ['nullable', 'numeric', 'digits:10'],
            'preference'       => ['nullable', 'exclude_if:role,' . implode(',', UserRole::ADMIN_LIST) . ',' . UserRole::BASIC_USER. ','.UserRole::ORGANIZER, 'required_if:role,'.UserRole::ARTIST, 'string', 'in:' . implode(',', array_keys(PreferenceType::LIST))],
            'dob'              => ['nullable', 'date_format:Y-m-d'],
            'club_name'        => ['nullable', 'exclude_if:role,' . implode(',', UserRole::ADMIN_LIST) . ',' . UserRole::BASIC_USER . ',' . UserRole::ARTIST, 'required_if:role,' . UserRole::ORGANIZER, 'string', 'max:191'],
            'club_address'     => ['nullable', 'exclude_if:role,' . implode(',', UserRole::ADMIN_LIST) . ',' . UserRole::BASIC_USER . ',' . UserRole::ARTIST, 'required_if:role,' . UserRole::ORGANIZER, 'string', 'max:191'],
            'club_description' => ['nullable', 'exclude_if:role,' . implode(',', UserRole::ADMIN_LIST) . ',' . UserRole::BASIC_USER . ',' . UserRole::ARTIST, 'string', 'max:255'],
            'established_date' => ['nullable', 'exclude_if:role,' . implode(',', UserRole::ADMIN_LIST) . ',' . UserRole::BASIC_USER . ',' . UserRole::ARTIST, 'required_if:role,' . UserRole::ORGANIZER, 'date_format:Y-m-d'],
        ];
        //no need to validate during update, because there will be no password field on update
        //there will be another form change password for updating password
        if ($this->isMethod('POST'))
        {
            $rules['password'] = $this->passwordRules();
        }else{
            $rules['role'] =  ['nullable',Rule::requiredIf(function () use ($user){
                return !$user->isSuperAdmin();
            }), Rule::excludeIf($user->isSuperAdmin()), 'string', 'exists:roles,key'];
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
