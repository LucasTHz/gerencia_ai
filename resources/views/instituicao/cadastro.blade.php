<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de instituicao</title>
</head>
<body>
@include('layouts.navbar')
<form class="row g-3" method="POST" action="{{route('instituicao.store')}}">
    @csrf
    <div class="col-md-3">
        <label for="inputEmail4" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="inputEmail4">
    </div>

    <div class="col-md-3">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">Rua</label>
        <input type="text" name="name" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">Estado</label>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label">Cep</label>
        <input type="text" class="form-control" id="inputZip">
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
</form>
</body>
</html>
