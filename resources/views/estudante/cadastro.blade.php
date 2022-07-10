@extends('layouts.navbar')
@section('title', 'Cadastro de estudante')

@section('content')
<h2>Dados do estudante<br></h2>
<form class="column g-4" method="POST" action="{{route('estudante.store')}}">
    @csrf
    <div class="col-md-4">
        <label for="inputNome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Seu nome"
            id="inputNome"><br>
        @error('nome')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            placeholder="Seu email" id="inputEmail"><br>
        @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputSenha" class="form-label">Senha</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="Sua senha" id="inputSenha"><br>
        @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputSenhaConfimar" class="form-label">Confirme sua senha</label>
        <input type="password" name="conf_senha" class="form-control @error('conf_senha') is-invalid @enderror"
            id="inputSenhaConfimar" placeholder="Confirme sua senha"><br>
        @error('conf_senha')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputMatricula" class="form-label">Numero de matricula</label>
        <input type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula"
            placeholder="Sua matricula" id="inputMatricula"><br>
        @error('matricula')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputCelular" class="form-label">Numero de celular</label>
        <input type="text" class="form-control @error('telefone_celular') is-invalid @enderror" name="telefone_celular"
            placeholder="Seu celular" id="inputCelular"><br>
        @error('telefone_celular')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputCpf" class="form-label">CPF</label>
        <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" placeholder="Seu CPF"
            id="inputCpf"><br>
        @error('cpf')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    </div>
    <div class="col-md-4">
        <label for="inputDate" class="form-label">Data de nascimento</label>
        <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento"
            id="inputDate"><br>
        @error('data_nascimento')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    </div>
    <div class="col-md-3">
        <label for="inputInstituicao" class="form-label">Instituicao de ensino</label>
        <select class="form-select @error('instituicao') is-invalid @enderror" id="inputInstituicao" name="instituicao">
            <option selected disabled value="">Selecione</option>
            @foreach($instituicoes as $instituicao)
            <option>{{$instituicao->nome}}</option>
            @endforeach
        </select><br>
        @error('instituicao')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <h2>Endereço<br></h2>
    </div>
    <div class="col-md-4">
        <label for="inputRua" class="form-label">Rua</label>
        <input type="text" class="form-control @error('rua') is-invalid @enderror" name="rua" placeholder="Sua rua"
            id="inputRua"><br>
        @error('rua')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputBairro" class="form-label">Bairro</label>
        <input type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro"
            placeholder="Seu bairro" id="inputBairro"><br>
        @error('bairro')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputNumero" class="form-label">Numero</label>
        <input type="numeric" class="form-control @error('numero') is-invalid @enderror" name="numero"
            placeholder="Seu bairro" id="inputNumero"><br>
        @error('numero')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="inputEstado" class="form-label">Estado</label>
        <select class="form-select @error('estado') is-invalid @enderror" id="inputEstado" name="estado">
            <option selected disabled value="">Selecione</option><br>
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
            placeholder="Sua cidade" id="inputCidade"><br>
        @error('cidade')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputComplemento" class="form-label">Complemento</label>
        <input type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento"
            placeholder="Complemento" id="inputComplemento"><br>
        @error('complemento')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div>
        <div class="col-md-4">
            <label for="inputResponsavel" class="form-label">Nome do responsavel</label>
            <input type="text" class="form-control @error('responsavel') is-invalid @enderror" name="responsavel"
                placeholder="Seu responsavel" id="inputResponsavel"><br>
            @error('responsavel')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputResponsavelNumber" class="form-label">Telefone do Responsavel</label>
            <input type="text" class="form-control @error('telefone_responsavel') is-invalid @enderror"
                name="telefone_responsavel" placeholder="Seu responsavel" id="inputResponsavelNumber"><br>
            @error('telefone_responsavel')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
</form>
@endsection
