<?php

namespace App\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
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
            'marca' => 'required|min:2|max:25',
            'modelo' => 'required|min:2|max:25',
            'numero' => 'required|numeric',
            'categoria' => 'required',
            'descricao' => 'required|min:3|max:500',
        ];
    }

    public function messages() {
        return [
            'marca.required' => 'A marca é de preenchimento obrigatório.',
            'modelo.required' => 'O modelo é de preenchimento obrigatório.',
            'numero.required' => 'O número é de preenchimento obrigatório.',
            'numero.numeric' => 'Este campo pode conter apenas números.',
            'categoria.required' => 'A categoria é de preenchimento obrigatório.',
            'descricao.required' => 'A descrição é de preenchimento obrigatório.',
            'descricao.min' => 'O campo descrição requer no mínimo 3 caracteres.',
        ];

    }
}
