<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Genre;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class GenreRequest extends FormRequest {

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $genreId = $this->route('genre');
        return [
            'name'    => ['required', 'string',  Rule::unique(Genre::class)->ignore($genreId) ,'max:191'],
            'excerpt' => ['required', 'string', 'max:255'],
        ];
    }

}
