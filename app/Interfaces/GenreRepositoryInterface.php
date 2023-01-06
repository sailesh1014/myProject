<?php
declare(strict_types=1);

namespace App\Interfaces;


use Illuminate\Support\Collection;

interface GenreRepositoryInterface {

    public function getGenreByName(array|string $nameList);
    public function addGenreToUser(Collection|array $ids);
}
