<?php

namespace App\Http\Controllers;

use App\Models\Instituicoes;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
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
        return view('instituicao.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instituicoes  $instituicoes
     * @return \Illuminate\Http\Response
     */
    public function show(Instituicoes $instituicoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instituicoes  $instituicoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituicoes $instituicoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instituicoes  $instituicoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituicoes $instituicoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instituicoes  $instituicoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituicoes $instituicoes)
    {
        //
    }
}
