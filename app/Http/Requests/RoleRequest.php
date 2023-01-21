<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Role;
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
                'label'       => ['required', 'string', 'max:191', Rule::unique(Role::class)->ignore($id)],
                'description' => ['required', 'string'],
            ];
    }
}
