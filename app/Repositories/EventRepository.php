<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;


class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    protected $model;

    public function __construct(Event $model)
    {
        parent::__construct($model);
    }

    public function paginatedWithQuery($meta, $query = null)
    {
        $query = \DB::table('events as e')
            ->select(
                'e.id',
                'e.title',
                'e.thumbnail',
                'e.status',
                'e.event_date',
                'e.created_at',
            );

        if(auth()->user()->isOrganizer()){
            $query->where('club_id', auth()->user()->club->id);
        }
        $query->where(function($q) use($meta){
            $q->orWhere('e.title', 'like', $meta['search'] . '%')
                ->orWhere('e.event_date', 'like', $meta['search'] . '%')
                ->orWhere('e.status', 'like', $meta['search'] . '%')
                ->orWhere('e.created_at', 'like', $meta['search'] . '%');
        });
        return $this->offsetAndSort($query, $meta);
    }

    public function getEventByKey(string|array $status)
    {
        return is_array($status) ? $this->model->whereIn('status', $status)->get() :$this->model->where('status', $status)->first();
    }
}
