@extends('layouts.navbar')
@section('title', 'Home | Gerencia ai')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h2 class="mt-8 ml-4 mb-2">Ultimos editais publicados</h2>
<div class="row row-cols-1 row-cols-md-3 g-2 ml-2">
    @foreach($editais as $edital)
    <div class="col">
        <div class="card mt-4 h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $edital->titulo_proposta }}</h5>
                <p class="card-text">{{ $edital->resumo }}</p>
                <a href="{{ route('edital.show', $edital->numero_edital) }}" class="card-link">Ver informações</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Inscrições até {{ $edital->termino_inscricao }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>

<h2 class="mt-5 ml-4 mb-2 t-5">Ultimos resultados publicados</h2>
<div class="row row-cols-1 row-cols-md-3 g-2 ml-2">
    @foreach($editais as $edital)
    @if ($edital->path_edital_resultado != NULL)
    <div class="col">
        <div class="card mt-4 h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $edital->titulo_proposta }}</h5>
                <p class="card-text">{{ $edital->resumo }}</p>
                <a href="{{ asset("editais/$edital->path_edital_resultado") }}" class="card-link">Ver resultado</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Publicacao em: {{ $edital->termino_inscricao }}</small>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection
