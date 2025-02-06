@extends('layouts.main')
@section('title','Detalhe do Cliente - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12"><h3>{{ $cliente->nome}}</h3></div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="cpf"><b>RA/Matrícula</b></label>
          <p>{{$cliente->matricula}}</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="whatsapp"><b>WhatsApp</b></label>
          <div>
              <a href="https://wa.me/+55{{$cliente->whatsapp}}" target="_blank">{{$cliente->whatsapp}} <i class="fa fa-link"></i></a>
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
                    Atendimentos
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descricação</th>
                                <th>Data</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Descricação</th>
                                <th>Data</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($cliente->orders as $order)
                            <tr>
                                <td>{{ $order->id}}</td>
                                <td>{{ $order->descricao}}</td>
                                <td>{{  date('d/m/Y', strtotime($order->data_cadastro)) }}</td>
                                <td>
                                    <a href="{{ route('editar-ordem', $order->id) }}" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('apagar-ordem', $order->id) }}" class="btn btn-sm btn-danger mt-1"><i class="fa fa-ban"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
            </div>
</div>
@endsection