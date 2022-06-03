<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de professor</title>
</head>

<body>
    @include('layouts.navbar')
    <form class="row g-3" method="POST" action="{{route('professor.store')}}">
        @csrf
        <div class="col-md-4">
            <label for="inputNome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                placeholder="Seu nome" id="inputNome">
            @error('nome')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Seu email" id="inputEmail">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputSenha" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Sua senha" id="inputSenha">
            @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputSenhaConfimar" class="form-label">Confirme sua senha</label>
            <input type="password" name="conf_senha" class="form-control @error('conf_senha') is-invalid @enderror"
                id="inputSenhaConfimar" placeholder="Confirme sua senha">
            @error('conf_senha')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputCelular" class="form-label">Numero de celular</label>
            <input type="text" class="form-control @error('celular') is-invalid @enderror" name="celular"
                placeholder="Seu celular" id="inputCelular">
            @error('celular')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputCpf" class="form-label">CPF</label>
            <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" placeholder="Seu CPF"
                id="inputCpf">
            @error('cpf')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputMatricula" class="form-label">NUmero de matricula</label>
            <input type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula"
                placeholder="Sua matricula" id="inputMatricula">
            @error('matricula')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="inputInstituicao" class="form-label">Instituicao de ensino</label>
            <select class="form-select @error('instituicao') is-invalid @enderror" id="inputInstituicao"
                name="instituicao">
                <option selected disabled value="">Selecione</option>
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
            <input type="text" class="form-control @error('endereco_curriculo') is-invalid @enderror"
                name="endereco_curriculo" placeholder="Seu Curriculo" id="inputCurriculo">
            @error('endereco_curriculo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</body>

</html>