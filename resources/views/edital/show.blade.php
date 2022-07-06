@extends('layouts.navbar')
@section('title', 'Inscrição | Gerencia aí')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Informacoes sobre o edital --}}
{{ $edital[0]->numero_edital }}
{{ $edital[0]->vagas_disponiveis_bolsa }}
{{ $edital[0]->vagas_disponiveis_voluntario }}
{{ $edital[0]->resumo }}
{{ $edital[0]->inicio_inscricao }}
{{ $edital[0]->termino_inscricao }}
{{ $edital[0]->titulo_proposta }}

<a href="{{ asset("editais/$path")}}" class="card-link">Ver edital</a>

<form action="{{ route('estudante.inscricao', $edital[0]->numero_edital) }}" method="POST">
@csrf
@method('POST')
    <button type="submit">
        Inscrever-se
    </button>
</form>
@endsection
