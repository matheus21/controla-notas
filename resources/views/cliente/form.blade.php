@extends('adminlte::page')

@section('title', 'ControlaNotas')

@section('content_header')
    <h1>Cadastro de cliente</h1>
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-body box box-success">
            <form id="formCliente"
                  name="cliente_form" method="post" action="{{route('cliente.cadastrar')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpf">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value=""
                                   placeholder="Nome" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" data-mask="000.000.000-00" class="form-control" id="cpf" name="cpf" value=""
                                   placeholder="CPF" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua"
                                   value="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                   value="" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="number"  class="form-control" id="numero" name="numero"
                                   value="" pattern="[0-9]" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   value="" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" data-mask="00000-000" class="form-control" id="cep" name="cep" placeholder="CEP"
                                   value="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" data-mask="(00)0000-0000" class="form-control" id="telefone" name="telefone"
                                   value="" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="text" data-mask="00/00/0000" class="form-control" id="data_nascimento" name="data_nascimento"
                                   value="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select id="sexo" name="sexo" class="form-control" required>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button form="formCliente" class="btn btn-success">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@stop
