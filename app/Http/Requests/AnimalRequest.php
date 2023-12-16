<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'animal_nome' => 'required|string|max:255',
            'chip' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'porte' => 'required|string|max:255',
            'raca' => 'required|string|max:255',
            'idade' => 'required|integer',
            'obito_data' => 'nullable|date',
            'obito_causa' => 'nullable|string|max:255',
        ];
    }
}
