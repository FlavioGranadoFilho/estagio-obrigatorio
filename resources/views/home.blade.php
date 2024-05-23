@extends('layouts.app')

@section('content')
<div class="container container-main mt-3">
    <div class="row px-3 justify-content-start">
        <h1 class="title-app">DASHBOARD ESTOQUE</h1>
    </div>
    <div class="row justify-content-center" style="padding-left: 3rem">
        <div class="col-md-3">
            <a href="#" style="text-decoration: none">
                <div class="card icon-dashboard">
                    <h1>Itens em estoque</h1>
                    <div class="text-end py-3 px-3">
                        <img src="{{ asset('imgs/itens-estoque.png') }}" alt="produtos" class="img-fluid icons-dashboard mt-3">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#" style="text-decoration: none">
                <div class="card icon-dashboard">
                    <h1>Entradas</h1>
                    <div class="text-end py-3 px-3">
                        <img src="{{ asset('imgs/entradas-estoque.png') }}" alt="produtos" class="img-fluid icons-dashboard mt-3">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#" style="text-decoration: none">
                <div class="card icon-dashboard">
                    <h1>Saidas</h1>
                    <div class="text-end py-3 px-3">
                        <img src="{{ asset('imgs/saida-estoque.png') }}" alt="produtos" class="img-fluid icons-dashboard mt-3">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#" style="text-decoration: none">
                <div class="card icon-dashboard">
                    <h1>Filtros</h1>
                    <div class="text-end py-3 px-3">
                        <img src="{{ asset('imgs/icon-produtos.png') }}" alt="produtos" class="img-fluid icons-dashboard mt-3">
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
