@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12" id="relatorio">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Relatório de Atendimentos
                        </h6>
                        <a href="#"  onclick="Convert_HTML_To_PDF();" class="mt-1 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Baixar</a>
                    </div>                                       
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