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
                    <form method="POST" action="{{ route('produtos.store') }}">
                        @csrf

                        <div class="row mb-4 justify-content-center">
                            <div class="row mb-3 justify-content-center">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h2 class="text-white py-3 px-5">Novo Produto</h2>

                            <div class="col-md-6 text-center mt-5">
                                <input id="produto_nome" type="text" class="input-login mt-3 @error('produto_nome') is-invalid @enderror" name="produto_nome" value="{{ old('produto_nome') }}" required autocomplete="produto_nome" placeholder="Nome do Produto" autofocus>
                                @error('produto_nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 text-center mt-5">
                                <select id="categoria_id" class="input-login mt-3 @error('categoria_id') is-invalid @enderror" name="categoria_id" required>
                                    <option value="" disabled selected>Selecione a Categoria</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->categoria_id }}">{{ $categoria->categoria_nome }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 text-center mt-5">
                                <input id="produto_serial_number" type="text" class="input-login mt-3 @error('produto_serial_number') is-invalid @enderror" name="produto_serial_number" value="{{ old('produto_serial_number') }}" required autocomplete="produto_serial_number" placeholder="S/N">
                                @error('produto_serial_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center mb-0">
                            <div class="col text-center mt-5">
                                <button type="submit" class="btn submit-btn mb-3 mt-3">
                                    {{ __('Salvar Produto') }}
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