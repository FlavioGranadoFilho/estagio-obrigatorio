@extends('layouts.app')

@section('content')
<div class="container container-main mt-3">
    <div class="row px-3 justify-content-start">
        <h1 class="title-app">DASHBOARD ESTOQUE</h1>
    </div>
    <div class="row justify-content-center" style="padding-left: 3rem">
        <div class="container">
            <div class="card content-layout">
                <div class="card-body">
                    <form method="POST" action="{{ route('categorias.update', $categoria->categoria_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3 justify-content-center">
                            <h2 class="text-white py-3 px-5">Editar Categoria</h2>

                            <div class="col-md-6 text-center mt-5">
                                <input id="categoria_nome" type="text" class="input-login mt-3 @error('categoria_nome') is-invalid @enderror" name="categoria_nome" value="{{ old('categoria_nome', $categoria->nome_categoria) }}" required autocomplete="categoria_nome" placeholder="Nome da Categoria" autofocus>

                                @error('categoria_nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center mb-0">
                            <div class="col text-center mt-5">
                                <button type="submit" class="btn submit-btn mb-3 mt-3">
                                    {{ __('Atualizar Categoria') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection