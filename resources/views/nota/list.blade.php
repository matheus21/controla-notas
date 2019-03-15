@extends('adminlte::page')

@section('title', 'ControlaNotas')

@section('content_header')
    <h1 class="page-header">Listagem de notas</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-body box box-primary">
            <form id="formListaNotas" method="get" action="{{route('nota.list')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cliente_id">Cliente</label>
                            <select id="cliente_id" name="cliente_id" class="form-control">
                                <option value="">Todos</option>
                                @foreach($clientes as $cliente)
                                    <option @if (request()->get('cliente_id') == $cliente->id) selected @endif
                                    value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data_emissao">Data de emissão</label>
                            <input type="date" class="form-control" id="data_emissao" name="data_emissao"
                                   value="{{request()->get('data_emissao')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="text" class="form-control" id="codigo" name="codigo"
                                   value="{{request()->get('codigo')}}">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button form="formListaNotas" data-route="{{route('nota.pdf')}}" onclick="alteraActionForm($(this));" class="btn btn-warning">Exportar PDF</button>
                    <button form="formListaNotas" data-route="{{route('nota.list')}}" onclick="alteraActionForm($(this));" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
        <div class="panel-body box box-default">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data Emissão</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Valor da Nota</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notas as $nota)
                    <tr>
                        <td>{{$nota->cliente->nome}}</td>
                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $nota->data_emissao)->format('d/m/Y')}}</td>
                        <td>{{$nota->codigo}}</td>
                        <td>R$ {{number_format($nota->valor_total, 2, '.', ',')}}</td>
                        <td><a href="{{route('nota.form', [$nota->id])}}" class="btn btn-warning" title="Editar Nota"><i class="fa fa-edit"></i></a>
                        <a href="{{route('nota.delete', [$nota->id])}}" class="btn btn-danger" onclick="return confirmaDeletarNota($(this));" title="Excluir Nota"><i class="fa fa-times"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $notas->links() }}
        </div>
    </div>

@stop