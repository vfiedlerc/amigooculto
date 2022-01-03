@extends('layouts.app')
@section('title','Adicionar Participante')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header">Atribuir participante</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('part.storepart')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <p>Usuário</p>
                                <select class="form-control" name="usuario">
                                    @foreach ($usuarios as $item)
                                <option value="{{$item->id}}">{{$item->email}} | {{$item->nome}}</option>
                                    @endforeach
                                        
                                </select>
                        </div>
                             <div class="form-group">
                                 <p>Sorteio</p>
                                    <select class="form-control" name="sorteio">
                                        @foreach ($sorteios as $item)
                                            <option value="{{$item->id}}">{{$item->descricao}}</option>
                                        @endforeach
                                    </select>
                             </div>
                        <button class="btn btn-success" type="submit">Atribuir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
