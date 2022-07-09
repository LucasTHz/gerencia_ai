<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstudanteRequest;
use App\Http\Requests\UpdateEstudanteRequest;
use App\Models\Edital;
use App\Models\Estudante;
use App\Models\Instituicoes;
use App\Rules\VerificaSenha;
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

    public function login()
    {
        return view('estudante.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreEstudanteRequest $request)
    {
        $celular = preg_replace('/[^0-9]/', '', $request->telefone_celular);
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);

        $id_instituicao = DB::table('Instituicao')
            ->where('nome', '=', $request->instituicao)
            ->get('id_instituicao');

        Estudante::create(array_merge($request->only(
            'nome',
            'email',
            'id_instituicao',
            'rua',
            'bairro',
            'numero',
            'estado',
            'cidade',
            'responsavel',
            'complemento',
            'data_nascimento',
            'matricula',
        ), [
            'id_instituicao' => $id_instituicao[0]->id_instituicao,
            'telefone_celular' => $celular,
            'cpf' => $cpf,
            'password' => bcrypt($request->password)
        ]));
        $request->session()->regenerate();

        return redirect('/')->with('success', 'Estudante cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudante $estudante)
    {
        $instituicao = $estudante->instituicoes()->get('nome');
        $instituicao = $instituicao[0]['nome'];
        $user = auth('estudante')->user();
        return view('estudante.show', [
            'estudante' => $estudante,
            'user' => $user,
            'instituicao' => $instituicao
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudante $estudante)
    {
        // return view('estudante.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstudanteRequest $request, Estudante $estudante)
    {
        // Valida os dados do formulario e cria um novo professor.
        $estudante->update($request->validated());

        $request->session()->regenerate();
        return back()->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudante  $estudante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudante $estudante)
    {
        $estudante->delete();
        return to_route('home')->with('destroy', 'Conta excluída com sucesso!');
    }

    /**
     * Change the password of the Estudante.
     */
    public function changePassword(Request $request)
    {
        $user = auth('estudante')->user();

        $request->validate([
            'atual_password' => [new VerificaSenha('estudante'), 'required'],
            'nova_senha' => ['min:8', 'max:16', 'required'],
            'conf_senha' => ['same:nova_senha', 'required'],
        ], [
            'atual_password.required' => 'A senha eh obrigatorio',
            'nova_senha.required' => 'A nova senha eh obrigatoria',
            'nova_senha.min' => 'Senha curta demais. Minimo de 6 caracteres',
            'nova_senha.max' => 'Senha curta demais. Maximo de carcatere 16',
            'conf_senha.required' => 'Confirmacao da senha obrigatoria',
            'conf_senha.same' => 'As senhas nao se conferem',
        ]);

        $professor = Estudante::find($user->id_professor);
        $professor->update(['password' => bcrypt($request->nova_senha)]);
        $request->session()->regenerate();

        return back()->with('success', 'Senha atualizada com sucesso!');
    }

    /**
     * Realize the inscription of the Estudante in a edital.
     */
    public function inscricao($edital)
    {
        $edital = DB::table('Edital')->select('*')->where('numero_edital', '=', $edital)->get();
        $user = auth('estudante')->user();
        $estudante = Estudante::find($user->id);

        $estudante->inscricoes()->attach((int)($edital[0]->numero_edital));

        return back()->with('success', 'Inscricao realizada com sucesso!');
    }

    public function inscricoes()
    {
        $estudante = auth('estudante')->user()->id;
        $inscricoes = Estudante::find($estudante)->inscricoes()->get();

        $edital = Edital::find($inscricoes[0]->numero_edital)->get('titulo_proposta');

        return view('estudante.inscricoes', [
            'inscricoes' => $inscricoes
        ]);
    }
}
