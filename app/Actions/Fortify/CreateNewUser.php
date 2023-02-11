<?php
declare(strict_types=1);

namespace App\Actions\Fortify;

use App\Constants\UserRole;
use App\Interfaces\ClubRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use App\Services\AuthService;
use App\Services\RoleService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers {

    use PasswordValidationRules;

    public function create(array $input): User
    {
        $authService = resolve(AuthService::class);
        $validationArr = [
            'first_name'           => ['required', 'string', 'max:191'],
            'last_name'            => ['required', 'string', 'max:191'],
            'user_name'            => ['required', 'string', 'max:191', Rule::unique(User::class)],
            'email'                => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password'             => $this->passwordRules(),
            'gender'               => ['nullable', 'string', 'in:male,female,others'],
            'address'              => ['required', 'string', 'max:191'],
            'phone'                => ['nullable', 'numeric', 'digits:10'],
            'dob'                  => ['nullable', 'date', 'before:' . now()->toDateString()],
            'terms_and_conditions' => ['required'],
        ];
        $selectedRole = $authService->selectedRole();
        if ($selectedRole === UserRole::ORGANIZER)
        {
            $validationArr['club_name'] = ['required', 'string', 'max:191'];
            $validationArr['club_address'] = ['required', 'string', 'max:191'];
            $validationArr['established_date'] = ['required', 'date', 'before:' . now()->toDateString()];
        }


        Validator::make($input, $validationArr, ['terms_and_conditions' => 'The :attribute must be accepted.',
                                                 'role.required'        => 'Select least one role.'])->validate();

        return DB::transaction(function () use ($input, $selectedRole, $authService) {
            $userRepository = resolve(UserRepositoryInterface::class);
            $roleService = resolve(RoleService::class);
            $input['role_id'] = $roleService->getRoleByKey($selectedRole)->id;
            $input['password'] = Hash::make($input['password']);
            $user = $userRepository->store(collect($input)->only(['first_name', 'last_name', 'user_name', 'email', 'password', 'gender', 'phone', 'dob', 'role_id', 'address'])->toArray());

            if ($selectedRole === UserRole::ORGANIZER)
            {
                $clubRepository = resolve(ClubRepositoryInterface::class);
                $input['user_id'] = $user->id;
                $input['name'] = $input['club_name'];
                $input['address'] = $input['club_address'];
                $clubRepository->store(collect($input)->only(['name', 'address', 'established_date', 'user_id'])->toArray());
            }
            $authService->forgetRole();

            return $user;
        });
    }
}
