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
        return [
            'genres'   => ['required', 'array', 'min:1', 'max:3'],
            'genres.*' => ['string', 'exists:genres,name'],
        ];
    }
}
