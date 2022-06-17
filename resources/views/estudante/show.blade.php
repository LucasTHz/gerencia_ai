@extends('layouts.navbar')
@section('title', 'Perfil | Gerencia ai')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@yield('content')


<h1>Dados pessoais</h1>
<form class="row g-3" method="POST" action="{{route('estudante.update', auth('estudante')->user()->id)}}">
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
    <input type="text" class="form-control @error('telefone_celular') is-invalid @enderror" name="telefone_celular"
      value="{{$user->telefone_celular}}" id="inputCelular">
    @error('telefone_celular')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputMatricula" class="form-label">Numero de matricula</label>
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
    <p>{{$instituicao}}</p>
    @error('instituicao')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <br>
  <br>
  <h2>Endereço</h2>
  </div>
  <div class="col-md-4">
    <label for="inputRua" class="form-label">Rua</label>
    <input type="text" class="form-control @error('rua') is-invalid @enderror" name="rua" value="{{$user->rua}}"
      id="inputRua">
    @error('rua')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputBairro" class="form-label">Bairro</label>
    <input type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro"
      value="{{$user->bairro}}" id="inputBairro">
    @error('bairro')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputNumero" class="form-label">Numero</label>
    <input type="numeric" class="form-control @error('numero') is-invalid @enderror" name="numero"
      value="{{$user->numero}}" id="inputNumero">
    @error('numero')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-3">
    <label for="inputEstado" class="form-label">Estado</label>
    <select class="form-select @error('estado') is-invalid @enderror" id="inputEstado" name="estado">
      <option selected>{{$user->estado}}</option>
      <option>Minas Gerais</option>
    </select>
    @error('estado')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputCidade" class="form-label">Cidade</label>
    <input type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade"
      value="{{$user->cidade}}" id="inputCidade">
    @error('cidade')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="inputComplemento" class="form-label">Complemento</label>
    <input type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento"
      value="{{$user->complemento}}" id="inputComplemento">
    @error('complemento')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Editar cadastro</button>
  </div>
</form>

<br>
<br>
<form action="{{route('estudante.password.change', auth('estudante')->user()->id)}}" method="post">
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

<!-- Button trigger modal -->
<button class="link-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Encerrar conta
</button>

<!-- Modal -->
<form action="{{route('estudante.destroy', auth('estudante')->user()->id)}}" method="POST">
  @csrf
  @method('DELETE')
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Encerramento de conta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Essa acao eh inrreversível, deseja continuar?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-danger">Continuar</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection