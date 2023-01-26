<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder {

    protected static array $permissionList = ['view', 'create', 'update', 'delete'];

    public function run(): void
    {
        $modelArr = ['user', 'genre'];
        $modelArrLength = count($modelArr);
        $start = 0;
        $create  = function () use(&$create, &$start,$modelArr,$modelArrLength){
            if($start === $modelArrLength){
                return;
            }
            array_walk(self::$permissionList, function ($el) use($modelArr,$start){
                $modal = $modelArr[$start];
                Permission::updateOrCreate(
                    ['key'         => "{$modal}-{$el}"],
                    [
                        'name'        => ucwords($modal)." ".ucwords($el),
                        'description' => "Allows to {$el} {$modal}s",
                    ]
                );
            });
            $start++;
            $create();
        };
        $create();
    }
}
