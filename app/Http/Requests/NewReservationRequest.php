<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewReservationRequest extends FormRequest
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
            'room_id' => 'required',
            'employee_id' => 'required',
            'date_in' => 'required|before:date_out',
            'date_out' => 'required',
        ];
    }

    public function messages()
    {
       return [
         'room_id.required' => 'La sélection du chambre est obligatoire',
         'employee_id.required' => 'La sélection de l employée est obligatoire',
         'date_in.required' => 'La date d entrée est obligatoire',
         'date_out.required' => 'La date de sortie est obligatoire',
       ];
    }
}
