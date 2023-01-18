<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontGenreRequest extends FormRequest {

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        /* TODO: Change max and min genre count from config or setting */
        $maxGenreCount = env('MAX_USER_GENRE_COUNT');
        $minGenreCount = env('MIN_USER_GENRE_COUNT');

        return [
            'genres'   => ['required', 'array', "min:$minGenreCount", "max:$maxGenreCount"],
            'genres.*' => ['string', 'exists:genres,name'],
        ];
    }
}
