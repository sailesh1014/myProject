<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Role;
use App\Rules\UniqueRoleKey;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest {

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('role');

        return
            [
                'name'          => ['required', 'string', 'max:191', Rule::unique(Role::class)->ignore($id), new UniqueRoleKey],
                'description'   => ['required', 'string'],
                'permissions'   => ['nullable', 'array'],
                'permissions.*' => ['string', 'max:191', 'exists:permissions,key'],
            ];
    }
}
