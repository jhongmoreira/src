@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Todos os Serviços</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Serviço</th>
                                <th>Valor</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Serviço</th>
                                <th>Valor</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($servicos as $servico)
                            <tr>
                                <td>{{ $servico->servico }}</td>
                                <td>{{ $servico->valor }}</td>
                                <td>
                                    <a href="{{ route('editar-servico', $servico->id) }}" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i></a>
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