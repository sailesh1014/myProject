<?php
declare(strict_types=1);

namespace App\Services;

use App\Constants\UserRole;
use App\Helpers\AppHelper;
use App\Http\Resources\UserResource;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService {

    private UserRepositoryInterface $userRepository;
    private RoleService $roleService;
    private GenreService $genreService;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleService = resolve(RoleService::class);
        $this->genreService = resolve(GenreService::class);
    }

    public function paginateWithQuery(array $input): array
    {
        $columns = [
            'first_name',
            'last_name',
            'email',
            'role',
            'created_at',
            'action',
        ];
        $meta = AppHelper::defaultTableInput($input, $columns);
        $resp = $this->userRepository->paginatedWithQuery($meta);

        return [
            'data' => UserResource::collection($resp['results']),
            'meta' => $resp['meta'],
        ];
    }

    public function createNewUser(array $input): object
    {
        $role = $this->roleService->getRoleByKey($input['role']);
        $genreIds = $this->genreService->getGenreByName($input['genres'])->pluck('id');

        $input['password'] = Hash::make($input['password']);
        $input['role_id'] = $role->id;

        $user = $this->userRepository->store($input);
        $this->genreService->assignGenreToUser($genreIds, $user);
        return $user;
    }

    public function updateUser(array $input, User $user): void
    {
        $role = $this->roleService->getRoleByKey($input['role']);
        $genreIds = $this->genreService->getGenreByName($input['genres'])->pluck('id');

        $input['role_id'] = $role->id;

        $this->userRepository->update($input, $user);
        $this->genreService->assignGenreToUser($genreIds, $user);
    }


    public function updatePassword(array $input, $user = null): void
    {
        if(!$user) $user = auth()->user();
        $input['password'] = Hash::make($input['password']);;
        $this->userRepository->update($input, $user);
    }



    public function delete(User $user): void
    {
        $this->userRepository->delete($user);
    }

    public function getUserRole(): Role
    {
        return auth()->user()->role;
    }

}
