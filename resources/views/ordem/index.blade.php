@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="m-0 font-weight-bold text-primary">
                        @if(request()->is('ordens/abertas'))
                            Atendimentos em Aberto
                        @elseif(request()->is('ordens/fechadas'))
                            Atendimentos Concluídas
                        @elseif(request()->is('ordens/abertas/hoje'))
                            Atendimentos do Dia
                        @else
                            Atendimentos as Tarefas
                        @endif
                        </h6>
                    </div>

                    <div class="col-md-3">
                        <div class="dropdown text-right m-1">
                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Opções
                            </a>
                        
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('ordens-abertas') }}">Abertos</a>
                                <a class="dropdown-item" href="{{ route('ordens-fechadas') }}">Concluídos</a>
                                <a class="dropdown-item" href="{{ route('ordens') }}">Todos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('nova-ordem') }}">Nova</a>
                            </div>
                        </div>                 
                    </div>                                        
                </div>
            </div>





            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cod.</th>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cod.</th>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td> <span title="{{ $order->descricao }}"> {{ $order->id }} </span></td>
                                <td>
                                    @if($order->cliente->matricula == '')
                                        <i>Externo</i>
                                    @else
                                        {{ $order->cliente->matricula }}
                                    @endif
                                </td>
                                <td> <a href="{{ route('cliente', $order->cliente->id) }}"> {{ $order->cliente->nome }} </a></td>
                                <td>{{  date('d/m/Y', strtotime($order->data_cadastro)) }}</td>
                                <td>
                                    @if ($order->finalizado == 0)
                                        <span class="badge badge-danger">Não Iniciado</span>
                                    @elseif ($order->finalizado == 1)
                                        <span class="badge badge-warning">Em Andamento</span>
                                    @else
                                        <span class="badge badge-success">Concluído</span>                                    
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('editar-ordem', $order->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-ban" data-toggle="modal" data-target="#exampleModal{{$order->id}}"></i></button>
                                    <!-- Modal -->
                                    <form action="{{ route('apagar-ordem', $order->id) }}" method="post">
                                    @csrf
                                        <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Venda {{$order->id}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Deseja realmente apagar esta Tarefa?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Sim, desejo apagar.</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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