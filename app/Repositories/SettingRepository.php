<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;


class SettingRepository extends BaseRepository implements SettingRepositoryInterface {

    protected $model;

    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function upsert(array $input, array $conditionArr, array $toUpdateArr): void
    {
        DB::transaction(function () use ($input, $conditionArr, $toUpdateArr){
            $this->model->upsert($input, $conditionArr,$toUpdateArr);
        });
    }
}
