@extends('layouts.navbar')
@section('title', 'Home | Gerencia ai')

@section('content')
<div id="liveAlertPlaceholder">
    <div class="row">
        @if (session('msg'))
        <p class="msg">{{ session('msg') }}</p>
        @endif
        @yield('content')
    </div>
</div>

@auth('estudante')
    <div class="row">
        <div class="col-md-12">
            {{-- {{dd(auth()->user())}} --}}
        </div>
    </div>
@endauth
<h1 class="mt-8 text-center mb-4">Notícias</h1>

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
@endsection