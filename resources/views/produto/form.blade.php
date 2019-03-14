@extends('adminlte::page')

@section('title', 'ControlaNotas')

@section('content_header')
    <h1>Cadastro de produto</h1>
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-body box box-success">
            <form id="formProduto" name="produto_form" method="post" action="{{route('produto.cadastrar')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value=""
                                   placeholder="Nome" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" value=""
                                   placeholder="Marca" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tamanho">Tamanho</label>
                            <input type="text" class="form-control" id="tamanho" name="tamanho"
                                   value="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cor">Cor</label>
                            <input type="text" class="form-control" id="cor" name="cor"
                                   value="" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" data-mask="000.000.000.000.000,00" onkeyup="converteFormatoMoedaEmFloat($(this))" data-mask-reverse="true" class="form-control" required>
                            <input type="hidden" id="valor" name="valor" value="">
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
