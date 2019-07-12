<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewExitPermissionRequest extends FormRequest
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
            'exitDate' => 'required',
            'exitTime' => 'required',
            'entranceTime' => 'required',
            'exitReason' => 'required',
        ];
    }

    public function messages()
    {
       return [
           'exitDate.required' => 'La date de sortie est obligatoire',
           'exitTime.required' => 'Le temps de sortie est obligatoire',
           'entranceTime.required' => 'La temps de retour est obligatoire',
           'exitReason.required' => 'Le motif de sortie est obligatoire',
       ];
    }
}
