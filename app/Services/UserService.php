<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserService {

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
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

    public function delete(User $user): void
    {
        $this->userRepository->delete($user);
    }


}
