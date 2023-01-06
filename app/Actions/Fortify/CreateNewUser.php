<?php
declare(strict_types=1);

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers {

    use PasswordValidationRules;

    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name'           => ['required', 'string', 'max:191'],
            'last_name'            => ['required', 'string', 'max:191'],
            'email'                => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password'             => $this->passwordRules(),
            'terms_and_conditions' => ['required'],
        ], ['terms_and_conditions' => 'The :attribute must be accepted.'])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name'  => $input['last_name'],
            'email'      => $input['email'],
            'role_id'    => Role::getDefaultRoleId(),
            'password'   => Hash::make($input['password']),
        ]);
    }
}
