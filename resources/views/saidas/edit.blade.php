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
                    <form method="POST" action="{{ route('saidas.update', $saida->saida_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3 justify-content-center">
                            <h2 class="text-white py-3 px-5">Editar Saída</h2>

                            <div class="col-md-6 text-center mt-5">
                                <select id="produto_id" class="input-login mt-3 @error('produto_id') is-invalid @enderror" name="produto_id" required>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->produto_id }}" {{ $saida->produto_id == $produto->produto_id ? 'selected' : '' }}>{{ $produto->produto_nome }}</option>
                                    @endforeach
                                </select>
                                @error('produto_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 text-center mt-5">
                                <input id="quantidade" type="number" class="input-login mt-3 @error('quantidade') is-invalid @enderror" name="quantidade" value="{{ old('quantidade', $saida->quantidade) }}" required autocomplete="quantidade" placeholder="Quantidade">
                                @error('quantidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 text-center mt-5">
                                <input id="saidas_estoque_data_saida" type="date" class="input-login mt-3 @error('saidas_estoque_data_saida') is-invalid @enderror" name="saidas_estoque_data_saida" value="{{ old('saidas_estoque_data_saida', $saida->saidas_estoque_data_saida) }}" required autocomplete="saidas_estoque_data_saida">
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
                                    {{ __('Atualizar Saída') }}
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
