<?php

namespace Database\Seeders;

use App\Constants\UserRole;
use App\Models\Rating;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run()
    {
         $roleService = resolve(RoleService::class);
         $role = $roleService->getRoleByKey(UserRole::ARTIST);
              $values = [1, 2, 3, 4, 5];
         User::where('role_id', $role->id)->get()->each(function($artist) use ($values)
         {
               User::where('id', '<>', $artist->id)->inRandomOrder()->limit(3)->each(function($user) use ($artist, $values){
                    $value = $values[array_rand($values)];
                    Rating::create(['from' => $user->id, 'to' => $artist->id, 'value' => $value]);
               });

         });
    }
}
