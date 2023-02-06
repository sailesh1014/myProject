<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\EventImageRepositoryInterface;
use App\Models\EventImage;


class EventImageRepository extends BaseRepository implements EventImageRepositoryInterface
{
    protected $model;

    public function __construct(EventImage $model)
    {
        parent::__construct($model);
    }

}
