<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function __construct(protected GenreService $genreService){
    }

    public function index(Request $request): View|JsonResponse
    {
        $this->authorize('view', Genre::Class);
        if (!$request->ajax())
        {
            return view('dashboard.genres.index');
        }
        $input = $request->only(['length', 'start', 'order', 'search']);
        $resp = $this->genreService->paginateWithQuery($input);
        return response()->json([
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($resp['meta']['recordsTotal']),
            "recordsFiltered" => intval($resp['meta']['recordsFiltered']),
            "data"            => $resp['data'],
        ], 200);
    }


    public function create(): View
    {
        $this->authorize('create', Genre::Class);
        $genre = new Genre();
        return view('dashboard.genres.create', compact('genre'));
    }


    public function store(GenreRequest $request): RedirectResponse
    {
        $this->authorize('create', Genre::Class);
        $input = $request->only(['name', 'excerpt', 'image', 'image_hidden_value']);
        $genre = $this->genreService->createNewGenre($input);
        return redirect(route('genres.show',$genre->id))->with('toast.success', 'Genre created successfully');
    }


    public function show(Genre $genre): View
    {
        $this->authorize('view', Genre::Class);
        return view('dashboard.genres.show', compact('genre'));
    }


    public function edit(Genre $genre): View
    {
        $this->authorize('update', Genre::Class);
        return view('dashboard.genres.edit', compact('genre'));
    }


    public function update(GenreRequest $request, Genre $genre): RedirectResponse
    {
        $this->authorize('update', Genre::Class);
        $input = $request->only(['name', 'excerpt', 'image', 'image_hidden_value']);
        $this->genreService->updateGenre($input, $genre);
        return redirect(route('genres.show',$genre->id))->with('toast.success', 'Genre updated successfully');
    }


    public function destroy(Genre $genre): JsonResponse
    {
        $this->authorize('destroy', Genre::Class);
        $this->genreService->delete($genre);
        return response()->json(['message' => 'Genre successfully deleted']);
    }
}
