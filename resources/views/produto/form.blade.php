@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastro de produto</h1>
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <form onsubmit="console.log('salva um produto');" id="formProduto"
                  name="cliente_form" method="post" action="">
                  {{csrf_field()}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}"
                               placeholder="Nome">
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="{{old('marca')}}"
                               placeholder="Marca">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tamanho">Tamanho</label>
                        <input type="text" class="form-control" id="tamanho" name="tamanho"
                               value="{{old('tamanho')}}">
                    </div>

                    <div class="form-group">
                        <label for="cor">Cor</label>
                        <input type="text" class="form-control" id="cor" name="cor"
                               value="{{old('cor')}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" id="valor" name="valor"
                               value="{{old('valor')}}">
                    </div>
                    <div class="text-right">
                        <button form="formProduto" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@stop
