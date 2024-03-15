@extends('layouts.public')
@section('title', 'Exata TI - Consltar')
@section('content')

<div class="card shadow mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Consultar Dados
        </h6>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
            <form action="{{ route('publico') }}" method="GET"
                class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                @csrf
                <div class="input-group">
                    <input name="buscar" type="number" class="form-control bg-light border-0 small" placeholder="Digite o CPF"
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
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
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Servico</th>
                                <th>Valor</th>
                                <th>Pago</th>
                                <th>Vencimento</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if($vendas)
                                @foreach($vendas as $venda)
                                <tr>
                                    <td>{{ $venda->cliente->nome }}</td>
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
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                </table>
                </div>
            </div>
</div>

@endsection