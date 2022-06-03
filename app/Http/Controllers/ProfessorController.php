<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
use App\Models\Professores;
use Illuminate\Http\Request;

class ProfessorController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professor.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessorRequest $request)
    {
        Professores::create(array_merge(
            $request->only('nome', 'email', 'password', 'celular', 'cpf', 'matricula', 'endereco_curriculo'),
            ['password' => bcrypt($request->password)]
        ));
        $request->session()->regenerate();
        return redirect('/')->with('msg', 'Professor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function show(Professores $professores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function edit(Professores $professores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professores $professores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professores $professores)
    {
        //
    }
}
