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
                    <form method="POST" action="{{ route('saidas.store') }}">
                        @csrf

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
                            <h2 class="text-white py-3 px-5">Nova Saída</h2>

                            <div class="col-md-6 text-center mt-5">
                                <select id="produto_id" class="input-login mt-3 @error('produto_id') is-invalid @enderror" name="produto_id" required>
                                    <option value="" disabled selected>Selecione o Produto</option>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->produto_id }}">{{ $produto->produto_nome }}</option>
                                    @endforeach
                                </select>
                                @error('produto_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 text-center mt-5">
                                <input id="saidas_estoque_quantidade" type="number" class="input-login mt-3 @error('saidas_estoque_quantidade') is-invalid @enderror" name="saidas_estoque_quantidade" value="{{ old('saidas_estoque_quantidade') }}" required autocomplete="saidas_estoque_quantidade" placeholder="Quantidade">
                                @error('saidas_estoque_quantidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 text-center mt-5">
                                <input id="saidas_estoque_data_saida" type="date" class="input-login mt-3 @error('saidas_estoque_data_saida') is-invalid @enderror" name="saidas_estoque_data_saida" value="{{ old('saidas_estoque_data_saida') }}" required autocomplete="saidas_estoque_data_saida">
                                @error('saidas_estoque_data_saida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center mb-0">
                            <div class="col text-center mt-5">
                                <button type="submit" class="btn submit-btn mb-3 mt-3">
                                    {{ __('Salvar Saída') }}
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
