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
                        <form action="{{ route('kanban-store') }}" method="post">
                            @csrf
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control"/>
                                </div>
                            </div>
        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date_create">Data</label>
                                    <input type="date" name="date_create" id="date_create" class="form-control"/>
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
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nome</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($kanbans as $kanban)                          
                <tr>
                    <td><a href="{{ $kanban->name }}" target="_blank">{{ $kanban->name }} </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>   
@endsection