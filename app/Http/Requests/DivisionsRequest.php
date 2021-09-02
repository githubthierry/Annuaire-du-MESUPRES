<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisionsRequest extends FormRequest
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
            'nom' => 'required|min:5|max:255'
        ];
    }

    public function messages(){
        return [
            'nom.required' => 'Veuillez entrer un nom.',
            'nom.min' => 'Le nom doit-être au minimum 5 caractères.',
            'nom.max' => 'Le nom ne devrait pas dépasser 255 caractères.'
        ];
    }
}
