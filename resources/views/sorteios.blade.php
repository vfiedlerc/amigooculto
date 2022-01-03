@extends('layouts.app')
@section('title','Meus Sorteios')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark">
                <div class="card-header">Meus Sorteios</div>
                <div class="card-body">
                    <div class="row">
                        @if ($sorteios->count()>0)
                            @foreach ($sorteios as $chave =>$res)
                            <div class="col-md-3 mr-5">
                                    <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                            <h5 class="card-title">{{$res->descricao}} </h5>
                                            <p class="card-text"></p>
                                            <a href="{{route('sorteio.exibe', $res->sorteio_id)}}" class="btn btn-primary">Verificar Sorteio</a>
                                            </div>
                                    </div>
                            </div>
                            
                            @endforeach
                        @else
                        <div class="col-md-12 text-center">
                                <div class="alert border-warning">
                                        <p>Aparentemente você não está em nenhum sorteio :(</p>
                                    </div>
                        </div>
                            
                        @endif
                            
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
