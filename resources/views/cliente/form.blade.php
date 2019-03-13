@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastro de cliente</h1>
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <form onsubmit="console.log('salva um cliente');" id="formCliente"
                  name="cliente_form" method="post" action="">
                  {{csrf_field()}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}"
                               placeholder="Nome">
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{old('cpf')}}"
                               placeholder="CPF">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rua">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua"
                               value="{{old('rua')}}">
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro"
                               value="{{old('bairro')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               value="{{old('complemento')}}">
                    </div>

                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"
                               value="{{old('cep')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone"
                               value="{{old('telefone')}}">
                    </div>

                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                               value="{{old('data_nascimento')}}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select id="sexo" name="sexo" class="form-control">
                            {{--@foreach($categorias as $categoria)--}}
                            {{--<option value   ="{{$categoria->id}}">{{$categoria->descricao}}</option>--}}
                            {{--@endforeach--}}
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button form="formCliente" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@stop
