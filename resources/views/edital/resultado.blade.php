@extends('layouts.navbar')
@section('title', 'Cadastrar resultado | Gerencia ai')

@section('content')

<div class="mask d-flex align-items-center h-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card-body p-5">
                    <h1 class="mb-5 text-center">Cadastro de resultado</h1>
                    <form action="{{ route('professor.cadastra.resultado') }}" method="POST" enctype="multipart/form-data"
                        style="z-index: 1">
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
                        </div>


                        <label class="form-label" for="customFile">Edital em PDF</label>
                        <input type="file" class="form-control @error('edital') is-invalid @enderror" id="customFile"
                            name="edital" />
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
@endsection
