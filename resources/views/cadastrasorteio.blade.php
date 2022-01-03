@extends('layouts.app')
@section('title','Cadastrar Sorteio')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header">Cadastro de Sorteio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('sorteio.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="descricao">Descrição do Sorteio</label>
                            <input type="text" name="descricao" maxlength="255" class="form-control" id="descricao">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
