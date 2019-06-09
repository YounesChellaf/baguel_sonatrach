<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPlanningRequest extends FormRequest
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
            'employee_id1' => 'required|not:employee_id2',
            'employee_id2' => 'required|not:employee_id1',
        ];
    }
    public function messages()
    {
        return [
          'room_id.required' => 'la chambre est obligatoire',
           'employee_id1.required' => 'l introduction d employee est obligatoire',
           'employee_id2.required' => 'l introduction d employee est obligatoire',
           'employee_id1.not' => 'l employee et son vis a vis doit etre different',
           'employee_id2.not' => 'l employee et son vis a vis doit etre different',
        ];

    }
}
