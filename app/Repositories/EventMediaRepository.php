<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\EventMediaRepositoryInterface;
use App\Models\Event;
use App\Models\EventMedia;


class EventMediaRepository extends BaseRepository implements EventMediaRepositoryInterface
{
    protected $model;

    public function __construct(EventMedia $model)
    {
        parent::__construct($model);
    }

    public function removeMediaByName(string|int $eventId, array|string $media){
        $media = is_array($media) ? $media : [$media];
        $this->model->where('event_id', $eventId)->whereIn('media', $media)->delete();
    }
}
