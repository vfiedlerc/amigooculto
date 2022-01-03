@extends('layouts.app')
@section('title','Início')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header"><i class="fa fa-birthday-cake"></i> Boas vindas @auth
                    {{Auth::user()->nome}}
                @endauth</div>
                <div class="card-body">
                    <p class="card-text">Seja bem vindo ao sistema de sorteio de amigo oculto.</p>
                    <p class="card-text">Através desse site você será capaz de criar um sorteio, adicionar participantes e 
                        adicionar lista de desejos dos participantes.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning">
                <div class="card-header">
                    <i class="fa fa-bar-chart"> </i> Algumas estatísticas do site
                </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">Número de Usuários : {{$qtd_user}}</li>
                        <li class="list-group-item">Número de Sorteios : {{$qtd_sort}}</li>
                        <li class="list-group-item">Número de Presentes : {{$qtd_pre}}</li>
                        </ul>
            </div>
        </div>
    </div>
    @guest
    <div class="row mt-3">
        <div class="col-md-8">
                <div class="card border-dark">
                        <div class="card-header">
                            <i class="fa fa-exclamation"></i> Instruções de Uso
                        </div>
                        <div class="card-body">
                            <p class="card-text">Tão fácil quanto andar para frente, abaixo estão os procedimentos para começar a usar</p>
                            <ol>
                                <li class="list-group-item">Cadastrar / Criar uma conta</li>
                                <li class="list-group-item">Realizar a criação de um sorteio</li>
                                <li class="list-group-item">Cadastrar o email dos participantes no sorteio</li>
                                <li class="list-group-item">Selecionar o sorteio desejado</li>
                                <li class="list-group-item">Efetuar o sorteio do nome</li>
                            </ol>

                        </div>
                    </div>
        </div>  
    </div>    
    @endguest
    
</div>
@endsection
