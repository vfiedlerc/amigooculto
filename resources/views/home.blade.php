@extends('layouts.app')
@section('title','Painel')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <p class="card-text">Você está em {{$num}} sorteios</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card border-dark">
                    <div class="card-header">Sua lista de desejos</div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Possui</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($presentes as $item)
                                        @if (Auth::id() ==$item->user_id)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>
                                            <td>{{$item->descricao}}</td>
                                            <td>
                                            @if ($item->possui == 1)
                                                Sim
                                            @else
                                                Não
                                            @endif</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                        <p class="card-text">Gostaria de adicionar um possivel presente?</p>
                        <form method="POST" action="{{route('home.addpres')}}">
                            @csrf
                                <div class="form-row">
                                  <div class="col-md-6">
                                    <input type="text" required class="form-control" name="presente">
                                  </div>
                                  <div class="col-md-3">
                                    <select class="form-control" required name="possui" >
                                        <option value="" disabled selected>Possui?</option>
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                                  </div>
                                  <div class="col-md-3">
                                      <button type="submit" class="btn btn-outline-success">Adicionar presente</button>
                                  </div>
                                </div>
                              </form>
                    </div>
                </div>
            </div>
        </div>


        @if (Cookie::get('sorteado_atual') !== null)
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card border-info">
                <div class="card-header">Lista de Desejos de {{$dados_user->nome}}|{{$dados_user->email}}</div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Possui</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($presentes_usuario as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>
                                            <td>{{$item->descricao}}</td>
                                            <td>
                                            @if ($item->possui == 1)
                                                Sim
                                            @else
                                                Não
                                            @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
</div>
@endsection
