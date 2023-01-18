<?php
declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontGenreRequest;
use App\Services\GenreService;
use Illuminate\Contracts\View\View;

class GenreController extends Controller {

    public function __construct(protected GenreService $genreService) {}

    public function index(): view
    {
        $genres = $this->genreService->allGenre();

        return view('front.select-genre', compact('genres'));
    }

    public function store(FrontGenreRequest $request): \Illuminate\Http\JsonResponse
    {
        $selectedGenres = $request->input('genres');
        $genreIds = $this->genreService->getGenreByName($selectedGenres)->pluck('id');
        $this->genreService->assignGenreToUser($genreIds);

        return response()->json(['url' => route('front.index')]);
    }
}
