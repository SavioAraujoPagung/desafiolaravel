<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFaccaoRequest extends FormRequest
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
            'nomeFantasia' => 'required | min:1 | max:255',
            'razaoSocial' => 'required | min:1 | max:255',
            'endereco' => 'required | min:1 | max:255',
            'telefone' => 'required | min:11 | max:11',
            'cnpj' => 'required | min:14 | max:14',
        ];
    }

}
