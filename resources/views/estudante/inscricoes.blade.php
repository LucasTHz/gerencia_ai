@extends('layouts.navbar')
@section('title', 'Minhas inscricoes')

@section('content')

<table class="table table-hover m-4 mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo Proposto</th>
            <th scope="col">Vagas Disponiveis para voluntario</th>
            <th scope="col">Vagas Disponiveis para bolsita</th>
            <th scope="col">Aprovamento</th>
        </tr>
    </thead>
    @ds($inscricoes);
    @foreach ($inscricoes as $inscricao)
    <tbody>
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $inscricao->titulo_proposta }}</td>
            <td>{{ $inscricao->vagas_disponiveis_voluntario }}</td>
            <td>{{ $inscricao->vagas_disponiveis_bolsa }}</td>
            <td>{{ $inscricao->pivot->aprovamento }} <a href="{{ route('home') }}"><button type="button" class="btn">Ir para resultados</button></a></td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection
