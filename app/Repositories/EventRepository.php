<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;


class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    protected $model;

    public function __construct(Event $model)
    {
        parent::__construct($model);
    }

}
