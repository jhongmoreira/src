@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Vendas</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Servico</th>
                                <th>Valor</th>
                                <th>Pago</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Servico</th>
                                <th>Valor</th>
                                <th>Pago</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($vendas as $venda)
                            <tr>
                                <td>{{ $venda->id }}</td>
                                <td>{{ $venda->cliente->nome }}</td>
                                <td>{{ $venda->servico->servico }}</td>
                                <td>{{ $venda->valor_final }}</td>
                                <td>{{ $venda->pago }}</td>
                                <td>
                                    <a href="{{ route('cliente', $venda->id) }}" class="btn btn-sm btn-primary mt-1"><i class="fa fa-eye"></i></a>
                                    <a href="{{  $venda->id }}" target="_blank" class="btn btn-sm btn-secondary mt-1"><i class="fa fa-folder"></i></a>
                                    <a href="{{ route('editar-cliente', $venda->id) }}" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('apagar-cliente', $venda->id) }}" class="btn btn-sm btn-danger mt-1"><i class="fa fa-ban"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
            </div>
</div>

        </div>
    </div>
@endsection