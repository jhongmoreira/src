@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                @if(request()->is('ordens/abertas'))
                    Tarefas em Aberto
                @elseif(request()->is('ordens/fechadas'))
                    Tarefas Concluídas
                @else
                    Todas as Tarefas
                @endif
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->cliente->nome }}</td>
                                <td>
                                    @if ($order->finalizado == 0)
                                        <span class="badge badge-danger">Em andamento</span>
                                    @else
                                        <span class="badge badge-success">Concluído</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('editar-ordem', $order->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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