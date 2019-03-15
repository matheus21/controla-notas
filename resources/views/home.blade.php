@extends('adminlte::page')

@section('title', 'ControlaNotas')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Produtos</h3>

                    <p>Novos Produtos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('produto.list')}}" class="small-box-footer">Mais info. <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Notas</h3>

                    <p>Cadastrar Notas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('nota.list')}}" class="small-box-footer">Mais info. <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Clientes</h3>

                    <p>Registrar Clientes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('cliente.list')}}" class="small-box-footer">Mais info. <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop
