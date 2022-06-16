<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class StoreEstudanteRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:Estudante,email',
            'password' => 'required|min:8|max:16',
            'conf_senha' => 'required|same:password',
            'telefone_celular' => 'required|unique:Estudante,telefone_celular',
            'cpf' => 'required|unique:Estudante,cpf|cpf',
            'matricula' => 'required|unique:Estudante,matricula',
            'instituicao' => 'required',
            'rua' => 'required|string|max:255',
            'bairro' => 'required|max:255|string',
            'numero' => 'required|numeric',
            'estado' => 'required|max:255|string',
            'cidade' => 'required|max:255|string',
            'responsavel' => 'max:255',
            'complemento' => 'max:255',
            // 'telefone_responsavel' => 'celular',
            'data_nascimento' => 'required|date',
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
            'password.required' => 'A senha eh obrigatorio',
            'password.min' => 'Senha curta demais. Minimo de 6 caracteres',
            'password.max' => 'Senha curta demais. Maximo de carcatere 16',
            'conf_senha.required' => 'Confirmacao da senha obrigatoria',
            'conf_senha.same' => 'As senhas nao se conferem',
            'matricula.required' => 'A matricula eh obrigatoria',
            'matricula.unique' => 'Numero de matricula ja cadastrada',
            'telefone_celular.required' => 'Número de celular é obrigatorio',
            'telefone_celular.unique' => 'Número de celular ja cadastrado',
            // 'telefone_celular.celular' => 'Número de celular invalido',
            'cpf.required' => 'CPF é obrigatorio',
            'cpf.unique' => 'CPF ja cadastrado',
            'cpf.cpf' => 'CPF invalido',
            'instituicao.required' => 'Instituição é obrigatoria',
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
            'data_nascimento.required' => 'Data de nascimento é obrigatoria',
            'data_nascimento.date' => 'Data de nascimento invalida',
            // 'telefone_responsavel.celular' => 'O campo telefone responsavel não é um celular válido.',
        ];
    }
}
