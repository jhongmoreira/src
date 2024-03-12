@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                @if(request()->is('vendas/pagas'))
                    Vendas Recebidas
                @elseif(request()->is('vendas/abertas'))
                    Vendas á Receber
                @else
                    Todas as Vendas
                @endif
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Servico</th>
                                <th>Valor</th>
                                <th>Pago</th>
                                <th>Vencimento</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Servico</th>
                                <th>Valor</th>
                                <th>Pago</th>
                                <th>Vencimento</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($vendas as $venda)
                            <tr>
                                <td><a href="{{ route('cliente', $venda->cliente->id) }}">{{ $venda->cliente->nome }}</a></td>
                                <td>{{ $venda->servico->servico }}</td>
                                <td>{{ 'R$ ' . number_format($venda->valor_final, 2, ',', '.'); }}</td>
                                <td>
                                    @if($venda->pago == 0)
                                    <p>Não</p>
                                    @else
                                    <p>Sim</p>
                                    @endif                                    
                                </td>
                                <td>{{  date('d/m/Y', strtotime($venda->data_vencimento)) }}</td>
                                <td>
                                    <a href="{{ route('venda', $venda->id) }}" class="btn btn-sm btn-primary mt-1"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('editar-venda', $venda->id) }}" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('apagar-venda', $venda->id) }}" class="btn btn-sm btn-danger mt-1"><i class="fa fa-ban"></i></a>
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