<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\SettingRepositoryInterface;
use Illuminate\Support\Collection;

class SettingService {

    public function __construct(protected SettingRepositoryInterface $settingRepository) {}


    public function getAllSettings(): Collection
    {
        return $this->settingRepository->all()->pluck('name', 'key');
    }

}
