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

    public function getGenreByName(array|string $nameList)
    {
        return is_array($nameList) ? $this->model->whereIn('name', $nameList)->get() : $this->model->where('name', $nameList)->first();
    }

    public function addGenreToUser(array|Collection $ids)
    {
        auth()->user()->genres()->sync($ids);
    }

}
