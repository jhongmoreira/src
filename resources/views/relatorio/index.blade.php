@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12" id="relatorio">
        

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                        <div class="col-md-5">
                            <h3 class="mb-0 text-gray-800">Relatório de Atendimentos</h3>
                        </div>

                        <div class="col-md-7 d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#exampleModal" >Filtrar</button>
                                    <!-- Modal -->
                                    <form action="{{ route('relatorio-periodos') }}" method="get">
                                    @csrf
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="start_date">Data Inicial:</label>
                                                    <input type="date" id="start_date" name="start_date" required class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="end_date">Data Final:</label>
                                                    <input type="date" id="end_date" name="end_date" required class="form-control">
                                                </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-secondary">Confirmar</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <a href="#"  onclick="Convert_HTML_To_PDF();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Baixar</a>
                        </div>

                    <!-- </div>  -->
                </div>
                
                
            </div>



                <div class="table-responsive p-2">
                    <table width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cod.</th>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cod.</th>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($atendimentos as $atendimento)
                            <tr>
                                <td>{{ $atendimento->id }}</td>
                                <td> {{ $atendimento->cliente->nome }} </td>
                                <td>{{  date('d/m/Y', strtotime($atendimento->data_cadastro)) }}</td>
                                <td>{{  date('H:m', strtotime($atendimento->hora_cadastro)) }}</td>
                                <td>
                                    @if ($atendimento->finalizado == 0)
                                        <span class="badge badge-danger">Não Iniciado</span>
                                    @elseif ($atendimento->finalizado == 1)
                                        <span class="badge badge-warning">Em Andamento</span>
                                    @else
                                        <span class="badge badge-success">Concluído</span>                                    
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>

</div>

        </div>
    </div>

@endsection