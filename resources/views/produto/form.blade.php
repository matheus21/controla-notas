@extends('adminlte::page')

@section('title', 'ControlaNotas')

@section('content_header')
    @if($produto->id)
        <h1 class="page-header">Edição de produto</h1>
    @else
        <h1 class="page-header">Cadastro de produto</h1>
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-body box box-primary">
            <form id="formProduto" name="produto_form" method="post" action="@if($produto->id) {{route('produto.edit', [$produto->id])}} @else {{route('produto.post')}} @endif">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$produto->nome}}"
                                   placeholder="Nome" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" value="{{$produto->marca}}"
                                   placeholder="Marca" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tamanho">Tamanho</label>
                            <input type="text" class="form-control" id="tamanho" name="tamanho"
                                   value="{{$produto->tamanho}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cor">Cor</label>
                            <input type="text" class="form-control" id="cor" name="cor"
                                   value="{{$produto->cor}}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" value="{{$produto->valor}}" data-mask="000.000.000.000.000,00" onkeyup="converteFormatoMoedaEmFloat($(this))" data-mask-reverse="true" class="form-control" required>
                            <input type="hidden" id="valor" name="valor" value="{{$produto->valor}}">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button form="formProduto" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop
