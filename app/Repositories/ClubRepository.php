<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\ClubRepositoryInterface;
use App\Models\Club;


class ClubRepository extends BaseRepository implements ClubRepositoryInterface
{
    protected $model;

    public function __construct(Club $model)
    {
        parent::__construct($model);
    }

}
