<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\GenreRepositoryInterface;
use App\Models\Genre;
use Illuminate\Support\Collection;


class GenreRepository extends BaseRepository implements GenreRepositoryInterface {

    protected $model;

    public function __construct(Genre $model)
    {
        parent::__construct($model);
    }

    public function paginatedWithQuery($meta, $query = null ): array
    {
        $query = \DB::table('genres as g')
            ->select(
                'g.id',
                'g.name',
                'g.excerpt',
                'g.created_at',
            );
        $query->where(function($q) use($meta){
            $q->orWhere('g.name', 'like', $meta['search'] . '%')
                ->orWhere('g.excerpt', 'like', $meta['search'] . '%')
                ->orWhere('g.created_at', 'like', $meta['search'] . '%');
        });
        return $this->offsetAndSort($query, $meta);
    }

    public function getGenreByName(array|string $nameList)
    {
        return is_array($nameList) ? $this->model->whereIn('name', $nameList)->get() : $this->model->where('name', $nameList)->first();
    }

    public function assignGenreToUser(array|Collection $ids, $user)
    {
        $user->genres()->sync($ids);
    }

}
