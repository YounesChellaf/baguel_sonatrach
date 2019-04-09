<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSupplierRequest extends FormRequest
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
      'supplierName' => 'required|min:3',
      'email' => 'required|email|unique:suppliers',
      'phone' => 'required|unique:suppliers',
      'mobile' => 'required|unique:suppliers',
      'address' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'supplierName.required' => "Le nom de fournisseur est obligatoire",
      'supplierName.min' => "Le nom doit être plus de 3 charactères",
      'email.required' => "L'email de fournisseur est obligatoire",
      'email.email' => "Veuillez svp présenter un email valide",
      'email.unique' => "L'email que vous avez présenter est déja affecté a un autre fournisseur",
      'phone.required' => "Le numéro de téléphone est obligatoire",
      'phone.unique' => "Le numéro de téléphone que vous avez présenter est déja affecté a un autre fournisseur",
      'mobile.required' => "Le numéro de mobile est obligatoire",
      'mobile.unique' => "Le numéro de mobile que vous avez présenter est déja affecté a un autre fournisseur",
      'address.required' => "L'addresse est obligatoire",

    ];
  }
}
