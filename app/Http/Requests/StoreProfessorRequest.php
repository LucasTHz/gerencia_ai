<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255|unique:Professor,email',
            'password' => 'required|min:8|max:16',
            'conf_senha' => 'required|same:password',
            'celular' => 'required|unique:Professor,celular',
            'cpf' => 'required|unique:Professor,cpf|cpf',
            'matricula' => 'required|unique:Professor,matricula',
            'endereco_curriculo' => 'max:255',
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
            'senha.required' => 'A senha eh obrigatorio',
            'senha.min' => 'Senha curta demais. Minimo de 6 caracteres',
            'password.max' => 'Senha curta demais. Maximo de carcatere 16',
            'conf_password.required' => 'Confirmacao da senha obrigatoria',
            'conf_password.same' => 'As senhas nao se conferem',
            'celular.required' => 'Número de celular é obrigatorio',
            'celular.unique' => 'Número de celular ja cadastrado',
            // 'telefone_celular.celular' => 'Número de celular invalido',
            'cpf.required' => 'CPF é obrigatorio',
            'cpf.unique' => 'CPF ja cadastrado',
            'cpf.cpf' => 'CPF invalido',
            'matricula.required' => 'Numero de matricula é obrigatorio',
            'matricula.unique' => 'Numero de matricula ja cadastrada',
            'endereco_curriculo.max' => 'Endereço do curriculo muito grande',
        ];
    }
}
