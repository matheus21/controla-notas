@extends('adminlte::page')

@section('title', 'ControlaNotas')

@section('content_header')
    <h1>Cadastro de nota</h1>
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-body box box-success">
            <form id="formNota" onsubmit="removerClone();" name="nota_form" method="post" action="{{route('nota.cadastrar')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cliente_id">Cliente</label>
                            <select id="cliente_id" name="cliente_id" class="form-control" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="data_emissao">Data de emissão</label>
                            <input type="text" data-mask="00/00/0000" class="form-control" id="data_emissao" name="data_emissao"
                                   value="" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="text" class="form-control" id="codigo" name="codigo"
                                   value="" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="produto_id">Produto</label>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <a class="btn btn-primary" onclick="adicionarProduto()">Adicionar Produto</a>
                                </div>
                                <select id="produto_id" name="produto_id" class="form-control">
                                    @foreach($produtos as $produto)
                                        <option value="{{$produto->id}}" data-valor="{{$produto->valor}}">{{$produto->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="valor_total">Valor Total</label>
                            <input type="text" readonly class="form-control" id="valor_total" name="valor_total" value="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Produtos</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item" data-valor-produtos="" id="item_clone" style="display: none">
                                        <span class="badge"></span>
                                        <a class="btn-sm btn-danger" onclick="removerProduto($(this))"><i class="fa fa-trash"></i>
                                        </a>&nbsp;<span class="nome_produto"></span>

                                        <input type="hidden" name="quantidade[]" value=""/>
                                        <input type="hidden" name="produto_id[]" value=""/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button form="formNota" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop
