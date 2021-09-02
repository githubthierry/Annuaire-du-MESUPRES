<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelsRequest extends FormRequest
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
            'nom' => 'required|string',
            'prenom'=> 'string',
            'ne' => 'required|date',
            'email' => 'required|email|unique:personnels,email_personnels',
            'contact' => 'required|min:10|numerice',
            'adresse' => 'required',
            'im'  => 'required|numeric',
            'posteID' => 'numeric',
            'diplome' => 'required',
            'specialite' => 'required',
            'grade' => 'required',
            'directions' => 'numeric',
            'date_debut_admin' => 'required|date',
            'poste_profiles' => 'required|string'
        ];
    }

    public function messages(){
        return [
            'nom.required' => 'Veuillez entrer votre nom.',
            'nom.min' => 'Le nom doit-être au minimum 5 caractères.',
            'nom.max' => 'Le nom ne devrait pas dépasser 255 caractères.',
            'sigle.required' => 'Veuillez entre un sigle.',
            'sigle.max' => 'Le sigle ne devrait pas dépasser 50 caractères.',
            // Message de vérification sur le contact
            'contact.required' => 'Veuillez entrer le numéro du téléphone.',
            'contact.min' => 'Le contact doit-être composer de 10 chiffres.',
            'contact.numeric' => 'Veuillez entrer un nombre entier !'
        ];
    }
}
