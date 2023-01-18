<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\GenreRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class GenreService {

    public function __construct(private GenreRepositoryInterface $genreRepository) {}

    public function allGenre(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->genreRepository->all();
    }


    public function getGenreByName(string|array $nameList)
    {
        return $this->genreRepository->getGenreByName($nameList);
    }

    public function assignGenreToUser(Collection|array $ids, $user = null){
        if(!$user) $user = auth()->user();
        return $this->genreRepository->assignGenreToUser($ids, $user);
    }
}
