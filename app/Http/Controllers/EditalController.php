<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEditalRequest;
use App\Models\Edital;
use App\Models\Instituicoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('edital.index', ['editais' => Edital::paginate(6)]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function resumo()
    {
        return view('welcome', ['editais' => Edital::paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edital.create', ['instituicoes' => Instituicoes::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditalRequest $request)
    {
        $intituicao = DB::table('Instituicao')->select('id_instituicao')->where('nome', '=', $request->instituicao)->get();
        // Armazeno no servidor o edital e pego caminho do edital para armazenar no banco de dados
        $path = Storage::disk('ftp')->put('', $request->file('edital'));

        Edital::create(array_merge(
            $request->only(
                'titulo_proposta',
                'resumo',
                'instituicao',
                'inicio_inscricao',
                'termino_inscricao',
                'vagas_disponiveis_bolsa',
                'vagas_disponiveis_voluntario',
                'numero_edital',
                'orgao_fumento_responsavel',
                'modelo_proposta'
            ),
            [
                'path_edital' => $path,
                'id_instituicao' => $intituicao[0]->id_instituicao
            ]
        ));
        return back()->with('success', 'Edital cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function show($edital)
    {
        $edital = DB::table('Edital')->select('*')->where('numero_edital', '=', $edital)->get();
        return view('edital.show', ['edital' => $edital, 'path' => $edital[0]->path_edital]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function edit(Edital $edital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edital $edital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edital $edital)
    {
        //
    }
}
