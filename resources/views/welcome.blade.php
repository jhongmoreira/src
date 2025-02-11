@extends('layouts.main')
@section('title', 'Exata TI - Dashboard')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#"  onclick="Convert_HTML_To_PDF();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Baixar relatório</a>
</div>

<!-- Content Row -->
<div class="row" id="relatorio">
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           Atendimentos do dia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderToday }} atendimentos</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <a href="{{ route('ordens') }}" class="button btn-sm btn-warning"><i class="fa fa-eye"></i></a>
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
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                           Atendimentos Concluídos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderOk }} concluídos</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-12">
                        <a href="{{ route('ordens-fechadas') }}" class="button btn-sm btn-info"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection