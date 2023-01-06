<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\GenreRepositoryInterface;
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

    public function addGenreToUser(Collection|array $ids){
        return $this->genreRepository->addGenreToUser($ids);
    }
}
