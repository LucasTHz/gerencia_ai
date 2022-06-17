@extends('layouts.navbar')
@section('title', 'Perfil | Gerencia ai')

@section('content')
<div id="liveAlertPlaceholder">
  <div class="row">
    @if (session('success'))
    <p class="success">{{ session('success') }}</p>
    @endif
    @yield('content')
  </div>
</div>
<h1>Dados pessoais</h1>
<form class="row g-3" method="POST" action="{{route('professor.update', auth('professor')->user()->id_professor)}}">
  @csrf
  @method('PUT')
  <div class="col-md-4">
    <label for="inputNome" class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$user->nome}}"
      id="inputNome">
    @error('nome')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}"
      id="inputEmail">
    @error('email')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputCelular" class="form-label">Numero de celular</label>
    <input type="text" class="form-control @error('celular') is-invalid @enderror" name="celular"
      value="{{$user->celular}}" id="inputCelular">
    @error('celular')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputMatricula" class="form-label">NUmero de matricula</label>
    <input type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula"
      value="{{$user->matricula}}" id="inputMatricula">
    @error('matricula')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-3">
    <label for="inputInstituicao" class="form-label">Instituicao de ensino</label>
    <select class="form-select @error('instituicao') is-invalid @enderror" id="inputInstituicao" name="instituicao" >
      <option selected>{{$trabalha[0]->nome}}</option>
      @foreach($instituicoes as $instituicao)
      <option>{{$instituicao->nome}}</option>
      @endforeach
    </select>
    @error('instituicao')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputCurriculo" class="form-label">Endereco curriculo</label>
    <input type="text" class="form-control @error('endereco_curriculo') is-invalid @enderror" name="endereco_curriculo"
      value="{{$user->endereco_curriculo}}" id="inputCurriculo">
    @error('endereco_curriculo')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Editar cadastro</button>
    </div>
</form>

<form action="{{route('professor.password.change', auth('professor')->user()->id_professor)}}" method="post">
  @csrf
  @method('POST')
  <h1>Minhas credenciais</h1>
  <div class="col-md-4">
    <label for="inputatual_password" class="form-label">Senha</label>
    <input type="password" name="atual_password" class="form-control @error('atual_password') is-invalid @enderror"
      placeholder="Sua senha atual" id="inputatual_password">
    @error('atual_password')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputnova_senha" class="form-label">Nova Senha</label>
    <input type="password" name="nova_senha" class="form-control @error('nova_senha') is-invalid @enderror"
      id="inputnova_senha" placeholder="Nova senha">
    @error('nova_senha')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputSenhaConfimar" class="form-label">Confirme sua senha</label>
    <input type="password" name="conf_senha" class="form-control @error('conf_senha') is-invalid @enderror"
      id="inputSenhaConfimar" placeholder="Confirme a nova senha">
    @error('conf_senha')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Alterar senha</button>
  </div>
</form>
@endsection