<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRequest extends FormRequest
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
      'firstName' => 'required|alpha|min:3',
      'lastName' => 'required|alpha|min:3',
      'username' => 'required|unique:users',
    ];
  }

  public function messages()
  {
    return [
      'firstName.required' => "Le nom est obligatoire",
      'firstName.alpha' => "Veuillez introduire un nom valide",
      'firstName.min' => "Le nom doit être plus de 3 charactères",
      'lastName.required' => "Le prénom est obligatoire",
      'lastName.alpha' => "Veuillez introduire un prénom valide",
      'lastName.min' => "Le prénom doit être plus de 3 charactères",
      'username.required' => 'Le nom d\'utilisateur est obligatoire',
      'username.unique' => 'Le nom d\'utilisateur que vous avez utilisé exise déjà',
      'password.required' => 'Le mot de passe est obligatoire!',
      'password.min' => 'Le mot de passe doit contenir au minimum 8 charactères!',
      'password.regex' => "Votre mot de passe doit avoir plus de 8 charactères, Contient au moin 1 Majuscule, 1 Minuscule, 1 Numérique et 1 Caractère spécial",
    ];
  }
}
