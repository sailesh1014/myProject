<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Interfaces\SettingRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SettingService {

    public function __construct(protected SettingRepositoryInterface $settingRepository) {}


    public function getAllSettings(): Collection
    {
        return $this->settingRepository->all()->pluck('name', 'key');
    }

    public function updateSettings($input): void
    {
        if(isset($input['app_logo'])){
            $imageName = AppHelper::renameImageFileUpload($input['app_logo']);
            $input['app_logo']->storeAs('public/settings', $imageName);
            $input['app_logo'] = $imageName;
        }
        $updateArr = collect($input)->map(function ($v,$k){
            return ['key'   => $k,
                'name'  => $v,
                'updated_at' => now()
            ];
        })->toArray();
            $this->settingRepository->upsert($updateArr, ['key'], ['name', 'updated_at']);
    }

}
