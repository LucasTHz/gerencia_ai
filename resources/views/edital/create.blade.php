@extends('layouts.navbar')
@section('title', 'Cadastrar edital | Gerencia ai')

@section('content')

@if (session('success'))
<div class="toast fade show position-fixed end-0 p-3 bg-success text-white" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div class="toast-header bg-success text-white">
        <strong class="me-auto">Sucesso</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{ session('success') }}
    </div>
</div>
@endif

<div class="mask d-flex align-items-center h-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card-body p-5">
                    <h1 class="mb-5 text-center">Cadastro de edital</h1>
                    <form action="{{route('edital.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="text" id="form6Example1" name="titulo_proposta"
                                        class="form-control @error('titulo_proposta') is-invalid @enderror"
                                        placeholder="Titulo" />
                                    <label class="form-label" for="form6Example1">Titulo</label>
                                    @error('titulo_proposta')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="text" id="form6Example2"
                                        class="form-control @error('modelo_proposta') is-invalid @enderror"
                                        name="modelo_proposta" placeholder="Descrição" />
                                    <label class="form-label" for="form6Example2">Modelo Proposta</label>
                                    @error('modelo_proposta')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="form-floating mb-4">
                            <select class="form-select @error('instituicao') is-invalid @enderror" id="inputInstituicao"
                                name="instituicao">
                                <option selected disabled value="">Selecione</option>
                                @foreach($instituicoes as $instituicao)
                                <option>{{$instituicao->nome}}</option>
                                @endforeach
                            </select>
                            <label class="form-label" for="form6Example3">Instituicao</label>
                            @error('instituicao')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="date" id="form6Example1"
                                        class="form-control @error('inicio_inscricao') is-invalid @enderror"
                                        name="inicio_inscricao" placeholder="Inicio Inscrição" />
                                    <label class="form-label" for="form6Example1">Data de Inicio</label>
                                    @error('inicio_inscricao')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="date" id="form6Example2"
                                        class="form-control @error('termino_inscricao') is-invalid @enderror"
                                        name="termino_inscricao" placeholder="Termino Inscrição" />
                                    <label class="form-label" for="form6Example2">Data de Termino</label>
                                    @error('termino_inscricao')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="number" id="form6Example6"
                                        class="form-control @error('vagas_disponiveis_bolsa') is-invalid @enderror"
                                        name="vagas_disponiveis_bolsa" placeholder="Numero de Bolsistas" />
                                    <label class="form-label" for="form6Example6">Numero de Bolsistas</label>
                                    @error('vagas_disponiveis_bolsa')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="number" id="form6Example6"
                                        class="form-control @error('vagas_disponiveis_voluntario') is-invalid @enderror"
                                        name="vagas_disponiveis_voluntario" placeholder="Numero de Voluntarios" />
                                    <label class="form-label" for="form6Example6">Numero de Voluntarios</label>
                                    @error('vagas_disponiveis_voluntario')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="text" id="form6Example1"
                                        class="form-control @error('numero_edital') is-invalid @enderror"
                                        name="numero_edital" placeholder="Numero do Edital" />
                                    <label class="form-label" for="form6Example1">Numero do Edital</label>
                                    @error('numero_edital')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-floating">
                                    <input type="text" id="form6Example2"
                                        class="form-control @error('orgao_fumento_responsavel') is-invalid @enderror"
                                        name="orgao_fumento_responsavel" placeholder="Orgao de Fomento" />
                                    <label class="form-label" for="form6Example2">Orgao de Fomento</label>
                                    @error('orgao_fumento_responsavel')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Message input -->
                        <div class="form-floating mb-4">
                            <textarea class="form-control @error('resumo') is-invalid @enderror" id="form6Example7"
                                rows="4" name="resumo" placeholder="Resumo aqui"></textarea>
                            <label class="form-label" for="form6Example7">Resumo</label>
                            @error('resumo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div>
                            <label class="form-label" for="customFile">Edital em PDF</label>
                            <input type="file" class="form-control @error('edital') is-invalid @enderror"
                                id="customFile" name="edital" />
                            <small>Arquivo em PDF com tamanho maximo de 6MB</small>
                            @error('edital')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-secondary btn-rounded btn-block mt-4">Cadastrar
                            edital
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</div>

<form>
    @endsection