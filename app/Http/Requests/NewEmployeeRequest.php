<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewEmployeeRequest extends FormRequest
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
      'first_name' => 'required|min:3|alpha',
      'last_name' => 'required|min:3|alpha',
      'email' => 'email|unique:employees',
      'address' => 'required',
      'employee_number' => 'required|unique:employees',
      'sexe' => 'required',
      'employee_type' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'first_name.required' => 'Le nom est obligatoire',
      'first_name.min' => 'Le nom doit avoir plus de 3 charactères',
      'first_name.alpha' => 'Veuillez svp présenter un nom valide',
      'last_name.required' => 'Le prénom est obligatoire',
      'last_name.min' => 'Le prénom doit avoir plus de 3 charactères',
      'last_name.alpha' => 'Veuillez svp présenter un prénom valide',
      'email.email' => 'Veuillez svp présenter un email valide',
      'email.unique' => "L'email que vous avez entrer est déja utilisé pour un autre employé",
      'address.required' => "L'addresse est obligatoire",
      'employee_number.required' => "Le numéro d'immatriculation est obligatoire",
      'employee_number.unique' => "Le numéro d'immatriculation que vous avez entré est déja utilisé pour un autre employé",
      'sexe' => 'Le sexe est obligatoire',
      'employee_type' => 'Le type d\'employé est obligatoire'
    ];
  }
}
