@extends('layouts.navbar')
@section('title', 'Home | Gerencia ai')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="text-5xl font-extrabold mb-8">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-violet-400">
                Editais cadastrados
            </span>
        </div>
        <div class="flex flex-wrap -m-12">
            <div class="p-12 md:w-1/2 flex flex-col items-start">
                <span
                    class="inline-block py-1 px-2 rounded bg-purple-50 text-purple-500 text-xs font-medium tracking-widest">CATEGORY</span>
                <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">Roof party normcore
                    before they sold out, cornhole vape</h2>
                <p class="leading-relaxed mb-8">Live-edge letterpress cliche, salvia fanny pack humblebrag narwhal
                    portland. VHS man braid palo santo hoodie brunch trust fund. Bitters hashtag waistcoat fashion axe
                    chia unicorn. Plaid fixie chambray 90's, slow-carb etsy tumeric. Cray pug you probably haven't heard
                    of them hexagon kickstarter craft beer pork chic.</p>
                <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                    <a class="text-purple-500 inline-flex items-center">Learn More
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <span
                        class="text-gray-400 mr-3 inline-flex items-center ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>1.2K
                    </span>
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                            </path>
                        </svg>6
                    </span>
                </div>
            </div>

        </div>
    </div>
</section>

{{--Editais cadastrados--}}
{{-- <div class="row row-cols-1 row-cols-md-3 g-2 ml-2"> --}}
    {{-- @foreach($editais as $edital)
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
    @endforeach --}}
{{-- </div> --}}

{{-- resultado dos Editais --}}
    {{-- @foreach($editais as $edital)
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
    @endforeach --}}
</div>
@endsection
