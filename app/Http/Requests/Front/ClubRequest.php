<?php

namespace App\Http\Requests\Front;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;

class ClubRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        $club_id = $this->route('id');
        try
        {
            $club_id = Crypt::decrypt($club_id);
        }catch(\Exception $e){
            throw new \Exception("Invalid action");
        }

        return $club_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        $club_id = $this->route('id');
        try
        {
            $club_id = Crypt::decrypt($club_id);
        }catch(\Exception $e){
            throw new \Exception("Invalid action");
        }
        return [
            'name'       => ['required', 'string', 'max:191'],
            'address'        => ['required', 'string', 'max:191'],
            'description'        => ['required', 'string'],
            'established_date'            => ['required', 'date', 'max:191'],
        ];
    }
}
