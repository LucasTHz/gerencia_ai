<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Models\Instituicoes;
use Illuminate\Support\Facades\DB;
use App\Models\Professores;
use App\Rules\VerificaSenha;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professores::all();
        dd($professores->instituicao());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professor.cadastro', ['instituicoes' => Instituicoes::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessorRequest $request)
    {
        // Valida os dados do formulario e cria um novo professor.

        $professor = Professores::create(array_merge(
            $request->only('nome', 'email', 'password', 'celular', 'cpf', 'matricula', 'endereco_curriculo'),
            ['password' => bcrypt($request->password)]
        ));

        // pegou o id da instituicao que foi passada no formulario
        $intituicao = DB::table('Instituicao')->select('id_instituicao')->where('nome', '=', $request->instituicao)->get();

        // Salva a relacao entre o professor e a instituicao na tabela Trabalha
        $professor->instituicoes()->attach($intituicao[0]);

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
        $user = auth('professor')->user();
        $trabalha = DB::table('Instituicao')
        ->join('Trabalha', 'Instituicao.id_instituicao', '=', 'Trabalha.id_instituicao')
        ->select('Instituicao.nome')
        ->where('Trabalha.id_professor', '=', $user->id_professor)
        ->get();

        return view('professor.show', ['user' => $user, 'trabalha' => $trabalha, 'instituicoes' => Instituicoes::all()]);
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
    public function update(UpdateProfessorRequest $request, Professores $professor)
    {
        // Valida os dados do formulario e cria um novo professor.
        $professor->update($request->validated());

        $request->session()->regenerate();
        return back()->with('msg', 'Dados atualizados com sucesso!');
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

    /**
     * Change the password of the Professor.
     */
    public function changePassword(Request $request)
    {
        $user = auth('professor')->user();


        $request->validate([
            'atual_password' => [new VerificaSenha, 'required'],
            'nova_senha' => ['min:8','max:16', 'required'],
            'conf_senha' => ['same:nova_senha', 'required'],
        ], [
            'atual_password.required' => 'A senha eh obrigatorio',
            'nova_senha.required' => 'A nova senha eh obrigatoria',
            'nova_senha.min' => 'Senha curta demais. Minimo de 6 caracteres',
            'nova_senha.max' => 'Senha curta demais. Maximo de carcatere 16',
            'conf_senha.required' => 'Confirmacao da senha obrigatoria',
            'conf_senha.same' => 'As senhas nao se conferem',
        ]);

        $professor = Professores::find($user->id_professor);
        $professor->update(['password' => bcrypt($request->nova_senha)]);
        $request->session()->regenerate();

        return back()->with('msg', 'Senha atualizada com sucesso!');
    }
}
