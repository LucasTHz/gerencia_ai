<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultadoEditalRequest extends FormRequest
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
            'numero_edital' => 'required|integer',
            'edital' => 'required|mimes:pdf|max:6048'
        ];
    }

    public function messages()
    {
        return [
            'titulo_proposta.required' => 'O titulo é obrigatório',
            'titulo_proposta.max' => 'Título grande demais',
            'numero_edital.required' => 'Número do edital é obrigatório',
            'numero_edital.integer' => 'Número do edital inválida',
            'edital.required' => 'Edital é obrigatório',
            'edital.mimes' => 'Edital deve ser um arquivo PDF',
        ];
    }
}
