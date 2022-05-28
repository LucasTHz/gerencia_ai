<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Lista de editais | Gerência Aí</title>
</head>
<body>
@include('layouts.navbar')
<h1 class="mt-8 text-center mb-4">Edtais cadastrados</h1>

<div class="row row-cols-1 row-cols-md-3 g-2 ml-2">
    @foreach($editais as $edital)
        <div class="col">
            <div class="card mt-4 h-100">
                <div class="card-body">
                    <h5 class="card-title">{{$edital->titulo_proposta}}</h5>
                    <p class="card-text">{{$edital->resumo}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Inscrições até {{$edital->termino_inscricao}}</small>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div>
    {{$editais->links()}}

</div>
</body>
</html>
