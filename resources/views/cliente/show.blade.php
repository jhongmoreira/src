@extends('layouts.main')
@section('title','Detalhe do Cliente - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12"><h3>{{ $cliente->nome}}</h3></div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="cpf"><b>CPF</b></label>
          <p>{{$cliente->cpf}}</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="whatsapp"><b>WhatsApp</b></label>
          <div>
              <a href="https://wa.me/{{$cliente->whatsapp}}" target="_blank">{{$cliente->whatsapp}} <i class="fa fa-link"></i></a>
          </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="email"><b>E-mail</b></label>
          <p>{{$cliente->email}}</p>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-2">
        <a href="{{ $cliente->pasta }}" target="_blank" class="btn btn-sm btn-primary" >
            <i class="fa fa-folder"></i> Abrir Pasta
        </a>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="obs"><b>Observação</b></label>
            <p>{{$cliente->obs}}</p>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Vendas
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Servico</th>
                                <th>Valor</th>
                                <th>Pago</th>
                                <th>Vencimento</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Servico</th>
                                <th>Valor</th>
                                <th>Pago</th>
                                <th>Vencimento</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($cliente->vendas as $venda)
                            <tr>
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
@endsection