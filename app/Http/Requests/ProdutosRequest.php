<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:60',    
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'valor' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'quantidade' => 'required|integer|digits_between:1,6|max:999999'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser uma string.',
            'nome.max' => 'O nome não pode ter mais de 60 caracteres.',
            
            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve estar em um dos seguintes formatos: jpeg, png, jpg, gif.',
            'imagem.max' => 'A imagem não pode ser maior que 2MB.',
            
            'valor.required' => 'O valor é obrigatório.',
           
            'categoria_id.required' => 'A categoria é obrigatória.',
            'categoria_id.exists' => 'A categoria selecionada não existe.',

            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.digits_between' => 'A quantidade deve ter entre 1 e 6 dígitos.',
            'quantidade.max' => 'A quantidade não pode ser maior que 999999.',
        ];
    }
}
