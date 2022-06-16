<?php

namespace App\Http\Requests;

use App\Models\Professores;
use App\Rules\VerificaSenha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateProfessorRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $user = auth('professor')->user();
        return [
            'nome' => 'required|max:255',
            'email' => ['required','email','max:255', Rule::unique('Professor', 'email')->ignore($user->id_professor, 'id_professor')],
            'atual_password' => [new VerificaSenha],
            // 'nova_senha' => ['min:8','max:16'],
            // 'conf_senha' => 'same:nova_senha',
            'celular' => ['required', Rule::unique('Professor', 'celular')->ignore($user->id_professor, 'id_professor')],
            'matricula' => ['required', Rule::unique('Professor', 'matricula')->ignore($user->id_professor, 'id_professor')],
            'endereco_curriculo' => 'max:255',
            'instituicao' => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'nome.required' => 'O nome eh obrigatorio',
            'nome.max' => 'Nome grande demais',
            'email.required' => 'O email eh obrigatorio',
            'email.email' => 'Email invalido',
            'email.unique' => 'Email ja cadastrado',
            'email.max' => 'Email grande demais',
            'atual_password.required' => 'A senha eh obrigatorio',
            'atual_password.min' => 'Senha curta demais. Minimo de 6 caracteres',
            'password.max' => 'Senha curta demais. Maximo de carcatere 16',
            'conf_password.required' => 'Confirmacao da senha obrigatoria',
            'conf_password.same' => 'As senhas nao se conferem',
            'celular.required' => 'Número de celular é obrigatorio',
            'celular.unique' => 'Número de celular ja cadastrado',
            // 'telefone_celular.celular' => 'Número de celular invalido',
            'matricula.required' => 'Numero de matricula é obrigatorio',
            'matricula.unique' => 'Numero de matricula ja cadastrada',
            'endereco_curriculo.max' => 'Endereço do curriculo muito grande',
            'instituicao.required' => 'Instituicao é obrigatoria',
        ];
    }
}
