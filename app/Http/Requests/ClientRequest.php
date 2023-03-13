<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'num_contrat' => ['required'], 
            'nom_complet' => ['required'], 
            'adresse' => ['required'],
            'image'=>['image'],
            'description' => ['string'],
            'date_debut_contrat' => ['date'],
            'nom_contact' => ['string'], 
            'tel_contact' => ['string'], 
            'dernier_mois_paye' => ['string']
        ];
    }
}
