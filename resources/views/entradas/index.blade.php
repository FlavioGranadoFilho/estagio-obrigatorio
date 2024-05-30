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
                    <div class="row mb-3 justify-content-center">
                        <h2 class="text-white py-3 px-5">Entradas</h2>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-12 text-end">
                            <a href="{{ route('entradas.create') }}" class="btn submit-btn mb-3 mt-3">Adicionar Nova Entrada</a>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-12">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Data de Entrada</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($entradas as $entrada)
                                        <tr>
                                            <td>{{ $entrada->entradas_estoque_id }}</td>
                                            <td>{{ $entrada->produto->produto_nome }}</td>
                                            <td>{{ $entrada->entradas_estoque_quantidade }}</td>
                                            <td>{{ date("d/m/Y",strtotime($entrada->entradas_estoque_data_entrada)) }}</td>
                                            <td>
                                                <a href="{{ route('entradas.edit', $entrada->entradas_estoque_id) }}" class="btn btn-primary">Editar</a>
                                                <form action="{{ route('entradas.destroy', $entrada->entradas_estoque_id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta entrada?')">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-12">
                            {{ $entradas->links('vendor.pagination.bootstrap-5') }} <!-- Especifica o template customizado -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
