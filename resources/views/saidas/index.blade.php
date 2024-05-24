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
                        <h2 class="text-white py-3 px-5">Saídas</h2>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-12 text-end">
                            <a href="{{ route('saidas.create') }}" class="btn submit-btn mb-3 mt-3">Adicionar Nova Saída</a>
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
                                        <th scope="col">Data de Saída</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($saidas as $saida)
                                        <tr>
                                            <td>{{ $saida->saidas_estoque_id }}</td>
                                            <td>{{ $saida->produto->produto_nome }}</td>
                                            <td>{{ $saida->saidas_estoque_quantidade_saida }}</td>
                                            <td>{{ date("m-d-Y", strtotime($saida->saidas_estoque_data_saida)) }}</td>
                                            <td>
                                                <a href="{{ route('saidas.edit', $saida->saida_id) }}" class="btn btn-primary">Editar</a>
                                                <form action="{{ route('saidas.destroy', $saida->saida_id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta saída?')">Excluir</button>
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
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-12">
                            {{ $saidas->links('vendor.pagination.bootstrap-5') }} <!-- Especifica o template customizado -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
