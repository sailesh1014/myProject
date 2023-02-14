<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\SettingRepositoryInterface;
use App\Models\Setting;


class SettingRepository extends BaseRepository implements SettingRepositoryInterface {

    protected $model;

    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

}
