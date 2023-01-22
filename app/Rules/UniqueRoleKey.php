<?php
declare(strict_types=1);
namespace App\Rules;

use App\Services\RoleService;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Str;

class UniqueRoleKey implements InvokableRule
{

    public function __invoke($attribute, $value, $fail): void
    {
        $key = (string) Str::of(strtolower($value))->camel();
        $roleService = resolve(RoleService::class);
        $role = $roleService->getRoleByKey($key);
        if($role && $key !== $role->key){
            $fail('The :attribute has already been taken.');
        }
    }
}
