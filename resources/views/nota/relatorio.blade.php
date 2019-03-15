<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">

<h2 class="page-header">Relatorio de Notas</h2>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Data Emissão</th>
        <th scope="col">Codigo</th>
        <th scope="col">Valor da Nota</th>
    </tr>
    </thead>
    <tbody>
    @foreach($notas as $nota)
        <tr>
            <td>{{$nota->cliente->nome}}</td>
            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $nota->data_emissao)->format('d/m/Y')}}</td>
            <td>{{$nota->codigo}}</td>
            <td>R$ {{number_format($nota->valor_total, 2, '.', ',')}}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>