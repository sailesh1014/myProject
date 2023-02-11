<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Constants\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\GenreService;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller {

    private UserService $userService;
    private RoleService $roleService;
    private GenreService $genreService;

    public function __construct(UserService $userService, RoleService $roleService, GenreService $genreService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->genreService = $genreService;
    }

    public function index(Request $request): View|JsonResponse
    {
        $this->authorize('view', User::Class);
        if (! $request->ajax())
        {
            return view('dashboard.users.index');
        }
        $input = $request->only(['length', 'start', 'order', 'search']);

        $resp = $this->userService->paginateWithQuery($input);

        return response()->json([
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($resp['meta']['recordsTotal']),
            "recordsFiltered" => intval($resp['meta']['recordsFiltered']),
            "data"            => $resp['data'],
        ], 200);
    }

    public function create(): View
    {
        $this->authorize('create', User::Class);
        $user = new User();
        $roles = $this->roleService->getPublicRoles(auth()->user()->isSuperAdmin());
        $genres = $this->genreService->allGenre();
        return view('dashboard.users.create', compact('user', 'roles', 'genres'));
    }


    public function store(UserRequest $request): RedirectResponse
    {
        $this->authorize('create', User::Class);
        $input = $request->only(['first_name', 'last_name', 'email', 'password', 'role', 'genres', 'user_name', 'gender', 'address', 'phone', 'dob', 'club_name', 'club_address', 'club_description', 'established_date']);
        $user = $this->userService->createNewUser($input);
        return redirect(route('users.show',$user->id))->with('toast.success', 'User created successfully');
    }

    public function show(User $user): View
    {
        $user->load('genres', 'role', 'club');
        $genres = $this->genreService->allGenre();
        return view('dashboard.users.show', compact('user', 'genres'));
    }


    public function edit(User $user): View
    {
        $this->authorize('update',$user);
        $roles = $this->roleService->getPublicRoles(auth()->user()->isSuperAdmin());
        $genres = $this->genreService->allGenre();
        return view('dashboard.users.edit', compact('user', 'roles', 'genres'));
    }


    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $this->authorize('update',$user);
        $input = $request->only(['first_name', 'last_name', 'email', 'password', 'role', 'genres', 'user_name', 'gender', 'address', 'phone', 'dob', 'club_name', 'club_address', 'club_description', 'established_date']);
        $this->userService->updateUser($input, $user);
        return redirect(route('users.show',$user->id))->with('toast.success', 'User updated successfully');
    }

    public function updatePassword(UserPasswordRequest $request, User $user): JsonResponse
    {
        $this->authorize('update',$user);
        $input = $request->only('passwords');
        $this->userService->updatePassword($input, $user);
        return response()->json(['message' => 'Password updated successfully']);
    }

    public function destroy(User $user): JsonResponse
    {
        $this->authorize('delete',$user);
        $this->userService->delete($user);
        return response()->json(['message' => 'User successfully deleted']);
    }
}
