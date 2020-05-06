<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTarefaRequest extends FormRequest
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
            'nome'       => 'required',
            'descricao'  => 'required', 
            'tempoMedio' => 'required | max:8 | min:0.1',
            'custo'      => 'required ', 
        ];
    }

    public function messages()
    {
        return [
            'nome.required'      => 'NOME OBRIGATÓRIO!',
            'descricao.required' => 'DESCRIÇÃO OBRIGATÓRIO!',
            'tempoMedio.required'=> 'TEMPO MÉDIO OBRIGATÓRIO!',
            'tempoMedio.min'     => 'TEMPO INVALIDO!',
            'tempoMedio.max'     => 'TEMPO INVALIDO!',
            'custo.required'     => 'CUSTO OBRIGATÓRIO!',
        ];
    }
}
