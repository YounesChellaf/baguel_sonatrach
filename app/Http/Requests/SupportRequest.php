<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
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
            'motif_support' => 'required',
            'support_date_from' => 'required|before:support_date_to',
            'support_date_to' => 'required',
        ];
    }
    public function messages()
    {
        return [
          'motif_support.required' => 'le motif de la prise en charge est obligatoire',
          'support_date_from.required' => 'la date debut prise en charge est obligatoire',
          'support_date_to.required' => 'la date fin prise en charge est obligatoire',
          'support_date_to.before' => 'la date debut doit etre avant la date prise en charge est obligatoire',
        ];
    }
}
