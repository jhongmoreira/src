@extends('layouts.main')
@section('title', 'Exata TI - Dashboard')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <div class="justify-content-between">        
        <a href="#"  class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#novoAtendimento">
            <i class="fas fa-plus fa-sm text-white-50"></i> Novo
        </a>
    </div>
</div>

<div class="modal fade" id="novoAtendimento" tabindex="-1" role="dialog" aria-labelledby="novoKanbanLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="novoKanbanLabel">Novo Quadro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        
                    <div class="modal-body">
                        <form action="{{ route('salvar-ordem') }}" method="post">
                            @csrf
                    
                            <div class="row">                    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cliente_id">Contato</label>
                                        <select name="cliente_id" id="cliente_id" class="form-control" required>
                                            <option value=""></option>
                                            @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">
                                                @if($cliente->matricula =='')
                                                Externo - {{ $cliente->nome }}
                                                @else
                                                {{ $cliente->matricula }} - {{ $cliente->nome }}
                                                @endif
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="data_cadastro">Data</label>
                                        <input type="date" name="data_cadastro" id="data_cadastro" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hora_cadastro">Hora</label>
                                        <input type="time" name="hora_cadastro" id="hora_cadastro" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="finalizado">Status</label>
                                        <select name="finalizado" id="finalizado" class="form-control" required>
                                            <option value="0">Não iniciado</option>
                                            <option value="1">Em Andamento</option>
                                            <option value="2">Finalizado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                    
                    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descricao">Observação</label>
                                        <textarea name="descricao" id="descricao" rows="5" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>


<!-- Content Row -->
<div class="row" id="relatorio">
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                           Atendimentos do dia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderToday }} atendimentos</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <a href="{{ route('ordens-abertas-hoje') }}" class="button btn-sm btn-info"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                           Atendimentos Pendentes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $order }} pendentes</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <a href="{{ route('ordens-abertas') }}" class="button btn-sm btn-danger"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                           Atendimentos Concluídos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderOk }} concluídos</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <a href="{{ route('ordens-fechadas') }}" class="button btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection