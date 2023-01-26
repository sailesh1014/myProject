<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function __construct(protected RoleService $roleService)
    {
    }

    public function index(Request $request): View|JsonResponse
    {
        if (! $request->ajax())
        {
            return view('dashboard.roles.index');
        }
        $input = $request->only(['length', 'start', 'order', 'search']);

        $resp = $this->roleService->paginateWithQuery($input);
        return response()->json([
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($resp['meta']['recordsTotal']),
            "recordsFiltered" => intval($resp['meta']['recordsFiltered']),
            "data"            => $resp['data'],
        ], 200);
    }

    public function create(): View
    {
        $role = new Role();
        $role->load('permissions');
        $rolePermissions = $role->permissions->pluck('key')->toArray();
        $groupedPermissions = $this->roleService->getGroupedPermissions();
        return view('dashboard.roles.create', compact('role', 'groupedPermissions', 'rolePermissions'));
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        $input = $request->only(['name', 'description', 'permissions']);
        $role = $this->roleService->createNewRole($input);
        return redirect()->route('roles.show', compact('role'))->with('alert.success', 'Role successfully created !!');
    }

    public function show(Role $role): View
    {
        $role->load('permissions');
        $rolePermissions = $role->permissions->pluck('key')->toArray();
        $groupedPermissions = $this->roleService->getGroupedPermissions();
        return view('dashboard.roles.show', compact('role', 'groupedPermissions', 'rolePermissions'));
    }

    public function edit(Role $role): View
    {
        $role->load('permissions');
        $rolePermissions = $role->permissions->pluck('key')->toArray();
        $groupedPermissions = $this->roleService->getGroupedPermissions();
        return view('dashboard.roles.edit', compact('role', 'groupedPermissions', 'rolePermissions'));
    }

    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $input = $request->only(['name', 'description', 'permissions']);
        $this->roleService->updateRole($input,$role);
        return redirect()->route('roles.show', $role->id)->with('alert.success', 'Role Successfully Updated !!');
    }

    public function destroy(Role $role): JsonResponse
    {
        $this->roleService->deleteRole($role);
        return response()->json(['message' => 'Role successfully deleted']);
    }

}
