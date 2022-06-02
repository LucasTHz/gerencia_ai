<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstudanteRequest;
use App\Models\Edital;
use App\Models\Estudante;
use App\Models\Instituicoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('estudante.cadastro', [
            'instituicoes' => Instituicoes::get('nome')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreEstudanteRequest $request)
    {
            $id_instituicao = DB::table('Instituicao')
                ->where('nome', '=', $request->instituicao)
                ->get('id_instituicao');

        $estudante = Estudante::create(array_merge($request->only(
            'nome', 'email', 'senha', 'telefone_celular', 'cpf', 'id_instituicao', 'rua', 'bairro',
            'numero', 'estado', 'cidade', 'responsavel', 'complemento', 'data_nascimento'), [
                'id_instituicao' => $id_instituicao[0]->id_instituicao
        ]));

        return redirect('/')->with('msg', 'Estudante cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudante $estudante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudante $estudante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudante $estudante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudante $estudante)
    {
        //
    }
}
