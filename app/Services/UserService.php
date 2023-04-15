<?php
declare(strict_types=1);

namespace App\Services;

use App\Constants\UserRole;
use App\Helpers\AppHelper;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Rating;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService {

    private UserRepositoryInterface $userRepository;
    private RoleService             $roleService;
    private GenreService            $genreService;
    private ClubService             $clubService;

    private MediaService $mediaService;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleService = resolve(RoleService::class);
        $this->genreService = resolve(GenreService::class);
        $this->clubService = resolve(ClubService::class);
         $this->mediaService = new MediaService();
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
        return DB::transaction(function () use ($input) {
            $role = $this->roleService->getRoleByKey($input['role']);
            $input['password'] = Hash::make($input['password']);
            $input['role_id'] = $role->id;
            $user = $this->userRepository->store($input);

            if (isset($input['genres']) && ! in_array($input['role'], UserRole::ADMIN_LIST))
            {
                $genreIds = $this->genreService->getGenreByName($input['genres'])->pluck('id');
                $this->genreService->assignGenreToUser($genreIds, $user);
            }
            if ($input['role'] === UserRole::ORGANIZER)
            {
                $input['user_id'] = $user->id;
                $input['name'] = $input['club_name'];
                $input['address'] = $input['club_address'];
                $input['description'] = $input['description'] ?? null;
                $this->clubService->createNewClub(collect($input)->only(['name', 'address', 'established_date', 'user_id'])->toArray());
            }

            return $user;
        });
    }

    public function updateUser(array $input, User $user): void
    {
        DB::transaction(function () use ($input, $user) {
            $role = $this->roleService->getRoleByKey($input['role']);
            $input['role_id'] = $role->id;

            // currently only for artist
            if(!empty($input['thumbnail'])){
               $current_thumbnail = basename($user->thumbnail ?? "");
               $new_thumbnail = $input['thumbnail']->getClientOriginalName();
               if($current_thumbnail !== $new_thumbnail){
                    @unlink(public_path('storage/uploads/' . $user->thumbnail));
                 $input['thumbnail'] = $this->mediaService->uploadFile($input['thumbnail']);
               }else{
                    $input['thumbnail'] = $user->thumbnail;
               }
            }

             // Only for artist
             if(!empty($input['intro_video'])){
                  $current_video = basename($user->intro_video ?? "");
                  $new_video = $input['intro_video']->getClientOriginalName();
                  if($current_video !== $new_video){
                       @unlink(public_path('storage/uploads/' . $user->intro_video));
                       $input['intro_video'] = $this->mediaService->uploadFile($input['intro_video']);
                  }else{
                       $input['intro_video'] = $user->intro_video;
                  }
             }

            $this->userRepository->update($input, $user);


            if (isset($input['genres']) && isset($input['role']) && !in_array($input['role'], UserRole::ADMIN_LIST))
            {
                $genreIds = $this->genreService->getGenreByName($input['genres'])->pluck('id');
                $this->genreService->assignGenreToUser($genreIds, $user);
            }

            if ($input['role'] === UserRole::ORGANIZER)
            {
                $input['name'] = $input['club_name'];
                $input['address'] = $input['club_address'];
                $input['description'] = $input['description'] ?? null;

                $this->clubService->updateOrCreate(['user_id' => $user->id], collect($input)->only(['name', 'address', 'established_date', 'description'])->toArray());
            }else{
                if($user->club){
                    $this->clubService->delete($user->club);
                }
            }
        });
    }

    public function findUserOrCreate(array $condition, array $data)
    {
        return $this->userRepository->firstOrCreate($condition, $data);
    }

    public function find(int|string $userId)
    {
        return $this->userRepository->find($userId);
    }

    public function updatePassword(array $input, $user = null): void
    {
        if (! $user) $user = auth()->user();
        $input['password'] = Hash::make($input['password']);;
        $this->userRepository->update($input, $user);
    }

    public function delete(User $user): void
    {
        abort_if(auth()->user()->id === $user->id, 401, 'This action is unauthorized.');
        $this->userRepository->delete($user);
    }

     public function rateUser($user, $val): void
     {
          $conditionArr = ['from' => auth()->user()->id, 'to'=> $user->id];
          $updateArr = ['value' => $val];
          Rating::updateOrCreate($conditionArr, $updateArr);
     }

}
