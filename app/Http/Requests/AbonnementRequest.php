<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbonnementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'telephone' => 'unique:abonnes',
            'amplie_id' => 'required',
            'montant' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //'telephone.unique' => 'Ce numéro de téléphone est déjà associé à un abonnes',
            'amplie_id.required' => 'Veuillez spécifier l\'amplie utilisé',
            'montant.required' => 'Montant obligatoire (NB TV x Prix par TV)'
        ];
    }
}
