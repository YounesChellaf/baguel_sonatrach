<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class VisitRequest extends FormRequest
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
            'in_date' => 'required',
            'out_date' => 'required',
            'concerned_id' => 'required',
            'visitor_id' => 'required',
            'reason' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'in_date.required' => "La date d'entrée est obligatoire",
            'out_date.required' => "La date de sortie est obligatoire",
            'concerned_id.required' => "La designation de l'employée d'acceuil est obligatoire",
            'visitor_id.required' => "La designation des visiteurs est obligatoire",
            'reason.required' => "L'introduction d'une reason est obligatoire",
        ];
    }
}
