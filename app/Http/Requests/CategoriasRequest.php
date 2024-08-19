<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequest extends FormRequest
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
            'codigo' => 'required|string|max:10',
            'icone' => 'nullable|mimes:svg|max:2048',
            'descricao' => 'required|string|max:250',    
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser uma string.',
            'nome.max' => 'O nome não pode ter mais de 60 caracteres.',

            'codigo.required' => 'O código é obrigatório.',
            'codigo.max' => 'O código não pode ter mais de 10 caracteres.',

            'icone.mimes' => 'O icone deve estar no formato: svg.',
            'icone.max' => 'O icone não pode ser maior que 2MB.',
            
            'descricao.required' => 'A descrição é obrigatória.',
            'descricao.string' => 'A descrição deve ser uma string.',
            'descricao.max' => 'A descrição não pode ter mais de 250 caracteres.',
        ];
    }
}
