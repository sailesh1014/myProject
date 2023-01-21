<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
        $groupedPermissions = $this->roleService->getGroupedPermissions();
        $rolePermissions = $this->roleService->getRolePermissions("");
        return view('dashboard.roles.create', compact('role', 'groupedPermissions', 'rolePermissions'));
    }

    public function store(RoleRequest $request): View
    {
        $role = Role::create([
            'label' => $request->input('label'),
            'name' => Str::of($request->input('label'))->camel(),
            'description' => $request->input('description'),
        ]);
        $role->permissions()->sync($request->input('permissions'));
        return redirect()->route('roles.show', compact('role'))->with('alert.success', 'Successfully Created !!');
    }

}
