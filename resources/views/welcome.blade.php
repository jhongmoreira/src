@extends('layouts.main')
@section('title', 'Exata TI - Dashboard')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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

<!-- Novo atendimento -->
 <div class="row mb-2">
    <div class="col-md-1">
        <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#NovoAtendimento" aria-expanded="false" aria-controls="NovoAtendimento">
            <i class="fas fa-plus fa-sm text-white-50"></i> Novo
          </button>
    </div>
 </div>

<form action="{{ route('salvar-ordem') }}" method="post" class="collapse" id="NovoAtendimento">
    @csrf

    <div class="row">
        <div class="col-md-4">
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

        <div class="col-md-3">
            <div class="form-group">
                <label for="data_cadastro">Data</label>
                <input type="date" name="data_cadastro" id="data_cadastro" class="form-control" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="hora_cadastro">Hora</label>
                <input type="time" name="hora_cadastro" id="hora_cadastro" class="form-control" required>
            </div>
        </div>

        <div class="col-md-2">
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
    
    <div class="row">
        <div class="modal-footer col-md-12">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form>

@endsection