<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
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
      'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/|confirmed',
      'password_confirmation' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'password.required' => 'Le mot de passe est obligatoire!',
      'password.min' => 'Le mot de passe doit contenir au minimum 8 charactères!',
      'password.regex' => "Votre mot de passe doit avoir plus de 8 charactères, Contient au moin 1 Majuscule, 1 Minuscule, 1 Numérique et 1 Caractère spécial",
      'password.confirmed' => "Les deux mot de passes doivent être identiques",
      'password_confirmation.required' => "Vous devez confirmer le mot de passe",
    ];
  }
}
