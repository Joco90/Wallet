<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilRequest extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => 'Ce champ est requis',
            'name.string' => 'Le nom saisi est invalide',
            'name.max' => 'Le nom est trop long.',
            'firstnames.max' => 'Prénoms est trop long.',
            'firstnames.string' => 'Prénoms invalide.',
            'telephone.digits' => 'Numéro de téléphone invalide.',
            'email.required' => 'Ce champs est requis.',
            'email.email' => 'Adresse invalide.',
            'email.unique' => 'Adresse mail existante.',
            'photo.image' => 'Veuillez sélectionner une image.',
            'photo.mines' => 'l\'estension de l\'image invalide.',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:60',
            'firstnames' => 'string|max:80',
            'telephone' => 'digits:10|max:10',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email|unique:utilisateur|max:255',
        ];
    }
}
