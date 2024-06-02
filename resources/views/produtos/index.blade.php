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
                        <h2 class="text-white py-3 px-5">Produtos</h2>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-12 text-end">
                            <a href="{{ route('produtos.create') }}" class="btn submit-btn mb-3 mt-3">Adicionar Novo Produto</a>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-12">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome do Produto</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos as $produto)
                                        <tr>
                                            <td>{{ $produto->produto_id }}</td>
                                            <td>{{ $produto->produto_nome }}</td>
                                            <td>{{ $produto->quantidade_disponivel  }}</td>
                                            <td>{{ $produto->categoria->categoria_nome }}</td>
                                            <td>{{ $produto->produto_serial_number }}</td>
                                            <td>
                                                <a href="{{ route('produtos.edit', $produto->produto_id) }}" class="btn btn-primary">Editar</a>
                                                <form action="{{ route('produtos.destroy', $produto->produto_id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
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
                            {{ $produtos->links('vendor.pagination.bootstrap-5') }} <!-- Especifica o template customizado -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
