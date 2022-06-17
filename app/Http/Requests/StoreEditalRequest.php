<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditalRequest extends FormRequest
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
            'titulo_proposta' => 'required|max:255',
            'resumo' => 'required|max:255',
            'inicio_inscricao' => 'required|date',
            'termino_inscricao' => 'required|date',
            'vagas_disponiveis_bolsa' => 'required|integer',
            'vagas_disponiveis_voluntario' => 'required|integer',
            'numero_edital' => 'required|integer',
            'orgao_fumento_responsavel' => 'required|string|max:255',
            'modelo_proposta' => 'required|max:255',
            'instituicao' => 'required|string|max:255',
            'edital' => 'required|mimes:pdf|max:6048'
        ];
    }

    public function messages()
    {
        return [
            'titulo_proposta.required' => 'O titulo eh obrigatorio',
            'titulo_proposta.max' => 'Titulo grande demais',
            'resumo.required' => 'O resumo eh obrigatorio',
            'resumo.max' => 'Resumo grande demais',
            'inicio_inscricao.required' => 'Data de inicio de inscricao eh obrigatorio',
            'inicio_inscricao.date' => 'Data de inicio de inscricao invalida',
            'termino_inscricao.required' => 'Data de termino de inscricao eh obrigatorio',
            'termino_inscricao.date' => 'Data de termino de inscricao invalida',
            'vagas_disponiveis_bolsa.required' => 'Quantidade de vagas disponiveis eh obrigatorio',
            'vagas_disponiveis_bolsa.integer' => 'Quantidade de vagas disponiveis invalida',
            'vagas_disponiveis_voluntario.required' => 'Quantidade de vagas disponiveis eh obrigatorio',
            'vagas_disponiveis_voluntario.integer' => 'Quantidade de vagas disponiveis invalida',
            'numero_edital.required' => 'Numero do edital eh obrigatorio',
            'numero_edital.integer' => 'Numero do edital invalida',
            'orgao_fumento_responsavel.required' => 'Orgao fumento eh obrigatorio',
            'orgao_fumento_responsavel.max' => 'Orgao fumento grande demais',
            'modelo_proposta.required' => 'Modelo de proposta eh obrigatorio',
            'modelo_proposta.max' => 'Modelo de proposta grande demais',
            'instituicao.required' => 'Instituicao eh obrigatorio',
            'instituicao.max' => 'Instituicao grande demais',
            'edital.required' => 'Edital eh obrigatorio',
            'edital.mimes' => 'Edital deve ser um arquivo PDF',
        ];
    }
}
