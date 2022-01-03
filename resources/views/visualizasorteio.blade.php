@extends('layouts.app')
@section('title','Realizar sorteio')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger">
                <div class="card-header">Clique no botão para sortear</div>
                <div class="card-body">
                    <div class="form-group">
                        @if ($dados->count()<2)
                            <div class="alert alert-danger" role="alert">
                                Usuários Insuficientes
                            </div>
                        @else
                        @if ($sorteou->count() > 0)
                        <div class="alert alert-danger" role="alert">
                            Sorteio já realizado
                        </div>
                        @else
                        <form class="form-group" action="{{route('sorteio.efetua')}}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <button type="submit" class="mt-3 btn-lg btn-block btn btn-outline-success">Enviar</button>
                                </div>
                            </div>
                            
                                
                        </form>
                        @endif
                        
                        @endif
                        <div class="alert alert-info" role="alert">
                        Link do sorteio : <a href="{{url()->full()}}">{{url()->full()}}</a>
                          </div>
                    </div>
                        
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
