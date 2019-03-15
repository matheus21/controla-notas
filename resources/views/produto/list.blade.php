@extends('adminlte::page')

@section('title', 'ControlaNotas')

@section('content_header')
    <h1 class="page-header">Listagem de produtos</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-body box box-primary">
            <form id="formListaProdutos" method="get" action="{{route('produto.list')}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="{{request()->get('nome')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cor">Cor</label>
                            <input type="text" class="form-control" id="cor" name="cor"
                                   value="{{request()->get('cor')}}">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button form="formListaProdutos" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
        <div class="panel-body box box-default">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Valor do produto</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->marca}}</td>
                        <td>{{$produto->cor}}</td>
                        <td>R$ {{number_format($produto->valor, 2, '.', ',')}}</td>
                        <td><a href="{{route('produto.form', [$produto->id])}}" class="btn btn-warning" title="Editar Produto"><i class="fa fa-edit"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $produtos->links() }}
        </div>
    </div>

@stop