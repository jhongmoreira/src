@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kanbans</h1>
    <a href="#"  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#novoKanban">
        <i class="fas fa-plus fa-sm text-white-50"></i> Novo
    </a>
</div>

    
        <div class="modal fade" id="novoKanban" tabindex="-1" role="dialog" aria-labelledby="novoKanbanLabel"
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
                        <form action="{{ route('kanban-salvar') }}" method="post">
                            @csrf
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea name="descricao" id="descricao" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="0">Parado</option>
                                        <option value="2">Em Andamento</option>
                                        <option value="1">Concluído</option>
                                    </select>
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

<div class="row mb-5">

    <div class="col-12 col-lg-6 col-xl-3">

        <!-- Paradas  -->
        <div class="card card-border-primary">
            <div class="card-header bg-danger text-white">
                <h5 class="card-title">Parados</h5>
                <h6 class="card-subtitle">Processos parados ou não iniciados</h6>
            </div>
            
            @foreach($kanbans as $kanban)
                @if($kanban->status == 0)
                    <div class="card-body p-3">
                        <div class="card mb-1 bg-light">
                            <div class="card-body p-3">
                                <div class="mt-1">
                                    <p class="text-muted" style="font-size: 0.6em;"> <i class="fa fa-user"></i> {{ $kanban->usuario->name }}</p>
                                </div>
                                <p>{{ $kanban->mensagem }}</p>

                                <div class="dropdown no-arrow m-1">
                                    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <form action="{{ route('kanban-prosseguir', $kanban->id)}}" method="post">
                                            @csrf
                                            <button class="dropdown-item bg-info text-white" type="submit">Prosseguir</button>
                                        </form>
                                        <form action="{{ route('kanban-concluir', $kanban->id)}}" method="post">
                                            @csrf
                                            <button class="dropdown-item bg-success text-white" type="submit">Concluir</button>
                                        </form>
                                    </div>

                                </div>    

                            </div>
                            
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
        
    </div>

    <!-- Em andamento -->
    <div class="col-12 col-lg-6 col-xl-3">

        <div class="card card-border-primary">
            <div class="card-header bg-info text-white">
                <h5 class="card-title">Em Andamento</h5>
                <h6 class="card-subtitle">Processos sendo executados</h6>
            </div>

            @foreach($kanbans as $kanban)
                @if($kanban->status == 2)
                    <div class="card-body p-3">                        
                        <div class="card bg-light">
                            <div class="card-body p-3">                                
                                <div class="mt-1">
                                    <p class="text-muted" style="font-size: 0.6em;"> <i class="fa fa-user"></i> {{ $kanban->usuario->name }}</p>
                                </div>
                                <p>{{ $kanban->mensagem }}</p>

                                    <div class="dropdown no-arrow m-1">
                                        <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <form action="{{ route('kanban-parar', $kanban->id)}}" method="post">
                                                @csrf
                                                <button class="dropdown-item bg-danger text-white" type="submit">Parar</button>
                                            </form>
                                            <form action="{{ route('kanban-concluir', $kanban->id)}}" method="post">
                                                @csrf
                                                <button class="dropdown-item bg-success text-white" type="submit">Concluir</button>
                                            </form>
                                        </div>

                                    </div>    

                            </div>
                            
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

    </div>

    <!-- Finalizados -->
    <div class="col-12 col-lg-6 col-xl-3">

        <div class="card card-border-primary">
            <div class="card-header bg-success text-white">
                <h5 class="card-title">Finalizados</h5>
                <h6 class="card-subtitle">Processos concluídos</h6>
            </div>

            @foreach($kanbans as $kanban)
                @if($kanban->status == 1)
                    <div class="card-body p-3">
                        <div class="card mb-1 bg-light">
                            <div class="card-body p-3">
                                <div class="mt-1">
                                    <p class="text-muted" style="font-size: 0.6em;"> <i class="fa fa-user"></i> {{ $kanban->usuario->name }}</p>
                                </div>
                                <p>{{ $kanban->mensagem }}</p>

                                <div class="dropdown no-arrow m-1">
                                    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <form action="{{ route('kanban-parar', $kanban->id)}}" method="post">
                                            @csrf
                                            <button class="dropdown-item bg-danger text-white" type="submit">Parar</button>
                                        </form>
                                        <form action="{{ route('kanban-prosseguir', $kanban->id)}}" method="post">
                                            @csrf
                                            <button class="dropdown-item bg-info text-white" type="submit">Prosseguir</button>
                                        </form>
                                    </div>
                                    
                                </div>    

                            </div>
                            
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
        
    </div>

</div>   
@endsection