<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\EventImageRepositoryInterface;
use App\Models\EventMeda;


class EventImageRepository extends BaseRepository implements EventImageRepositoryInterface
{
    protected $model;

    public function __construct(EventMeda $model)
    {
        parent::__construct($model);
    }

}
