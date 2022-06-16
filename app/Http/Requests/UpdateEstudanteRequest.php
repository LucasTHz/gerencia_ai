<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateEstudanteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $user = auth('estudante')->user();
        return [
            'nome' => 'required|max:255',
            'email' => ['required','email','max:255', Rule::unique('Estudante', 'email')->ignore($user->id, 'id')],
            'rua' => 'required|string|max:255',
            'bairro' => 'required|max:255|string',
            'numero' => 'required|numeric',
            'estado' => 'required|max:255|string',
            'cidade' => 'required|max:255|string',
            'responsavel' => 'max:255',
            'complemento' => 'max:255',
            'telefone_celular' => ['required', Rule::unique('Estudante', 'telefone_celular')->ignore($user->id, 'id')],
            // 'telefone_responsavel' => 'celular',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome eh obrigatorio',
            'nome.max' => 'Nome grande demais',
            'email.required' => 'O email eh obrigatorio',
            'email.email' => 'Email invalido',
            'email.unique' => 'Email ja cadastrado',
            'email.max' => 'Email grande demais',
            'matricula.required' => 'A matricula eh obrigatoria',
            'matricula.unique' => 'Numero de matricula ja cadastrada',
            'telefone_celular.required' => 'Número de celular é obrigatorio',
            'telefone_celular.unique' => 'Número de celular ja cadastrado',
            // 'telefone_celular.celular' => 'Número de celular invalido',
            'rua.required' => 'Rua é obrigatoria',
            'rua.string' => 'Rua invalida',
            'rua.max' => 'Rua grande demais',
            'bairro.required' => 'Bairro é obrigatorio',
            'bairro.max' => 'Bairro grande demais',
            'bairro.string' => 'Bairro invalido',
            'numero.required' => 'Numero é obrigatorio',
            'numero.numeric' => 'Numero invalido',
            'estado.required' => 'Estado é obrigatorio',
            'estado.max' => 'Estado grande demais',
            'estado.string' => 'Estado invalido',
            'cidade.required' => 'Cidade é obrigatoria',
            'cidade.max' => 'Cidade grande demais',
            'cidade.string' => 'Cidade invalida',
            'complemento.max' => 'Complemento grande demais',
            'responsavel.max' => 'Nome do responsavel grande demais',
            // 'telefone_responsavel.celular' => 'O campo telefone responsavel não é um celular válido.',
        ];
    }
}
