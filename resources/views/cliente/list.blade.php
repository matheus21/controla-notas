@extends('adminlte::page')

@section('title', 'ControlaNotas')

@section('content_header')
    <h1 class="page-header">Listagem de clientes</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-body box box-primary">
            <form id="formListaClientes" method="get" action="{{route('cliente.list')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data_nascimento">Data de nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                                   value="{{request()->get('data_nascimento')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" data-mask="000.000.000-00" class="form-control" id="cpf" name="cpf"
                                   value="{{request()->get('cpf')}}">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button form="formListaClientes" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
        <div class="panel-body box box-default">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">CPF</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->cpf}}</td>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->telefone}}</td>
                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $cliente->data_nascimento)->format('d/m/Y')}}</td>
                        <td><a href="{{route('cliente.form', [$cliente->id])}}" class="btn btn-warning" title="Editar Cliente"><i class="fa fa-edit"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $clientes->links() }}
        </div>
    </div>

@stop