<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\EventMediaRepositoryInterface;
use App\Models\EventMedia;


class EventMediaRepository extends BaseRepository implements EventMediaRepositoryInterface
{
    protected $model;

    public function __construct(EventMedia $model)
    {
        parent::__construct($model);
    }

}
