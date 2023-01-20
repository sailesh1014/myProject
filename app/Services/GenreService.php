<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\AppHelper;
use App\Http\Resources\GenreResource;
use App\Interfaces\GenreRepositoryInterface;
use App\Models\Genre;
use Illuminate\Support\Collection;

class GenreService {

    public function __construct(private GenreRepositoryInterface $genreRepository) {}

    public function paginateWithQuery(array $input): array
    {
        $columns = [
            'name',
            'symbol',
            'created_at',
            'action',
        ];
        $meta = AppHelper::defaultTableInput($input, $columns);
        $resp = $this->genreRepository->paginatedWithQuery($meta);
        return [
            'data' => GenreResource::collection($resp['results']),
            'meta' => $resp['meta'],
        ];
    }

    public function createNewGenre(array $input): object
    {
        $symbol = $input['image'];
        $imageName = AppHelper::renameImageFileUpload($symbol);
        $pathPrefix = AppHelper::prepareFileStoragePath();
        $symbol->storeAs("public/uploads/$pathPrefix", $imageName);
        $input['symbol'] = "{$pathPrefix}/{$imageName}";
        return $this->genreRepository->store($input);
    }


    public function allGenre(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->genreRepository->all();
    }

    public function updateGenre(array $input, $genre): void{
        if(isset($input['image'])){
            $symbol = $input['image'];
            @unlink(public_path('storage/uploads/' . $genre->image));
            $imageName = AppHelper::renameImageFileUpload($symbol);
            $pathPrefix = AppHelper::prepareFileStoragePath();
            $symbol->storeAs("public/uploads/$pathPrefix", $imageName);
            $input['symbol'] = "{$pathPrefix}/{$imageName}";
        }
        $this->genreRepository->update($input, $genre);
    }


    public function getGenreByName(string|array $nameList)
    {
        return $this->genreRepository->getGenreByName($nameList);
    }

    public function assignGenreToUser(Collection|array $ids, $user = null){
        if(!$user) $user = auth()->user();
        return $this->genreRepository->assignGenreToUser($ids, $user);
    }

    public function delete(Genre $genre): void
    {
        $this->genreRepository->delete($genre);
    }
}
