<?php
declare(strict_types=1);

namespace App\Http\Requests\Front;

use App\Services\RoleService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $roleService = resolve(RoleService::class);
        $publicRoles = $roleService->getPublicRoles();
        return [
            'role'       => ['required', 'string', 'exists:roles,key', Rule::in(array_keys($publicRoles))],
        ];
    }
}
