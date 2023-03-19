<?php
declare(strict_types=1);

namespace App\Interfaces;


interface SettingRepositoryInterface {

    public function upsert(array $input, array $conditionArr,array $toUpdateArr): bool|int;
}
