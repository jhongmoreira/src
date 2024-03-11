@extends('layouts.main')
@section('title','Detalhes da Venda - Exata TI')
@section('content')

<div id="relatorio">

<div class="row">
    <div class="col-md-12"><h3>{{ $venda->cliente->nome}}</h3></div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="cpf"><b>CPF</b></label>
          <p>{{ $venda->cliente->cpf}}</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="whatsapp"><b>WhatsApp</b></label>
          <div>
              <a href="https://wa.me/+55{{ $venda->cliente->whatsapp}}" target="_blank"><i class="fa fa-link"></i> {{ $venda->cliente->whatsapp}}</a>
          </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="email"><b>E-mail</b></label>
          <p>{{ $venda->cliente->email}}</p>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-2">
        <a href="{{ $venda->cliente->pasta}}" target="_blank" class="btn btn-sm btn-primary" >
            <i class="fa fa-folder"></i> Abrir Pasta
        </a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="form-group">
            <label for="obs"><b>Observação</b></label>
            <p>{{$venda->cliente->obs}}</p>
        </div>
    </div>
</div>

<hr>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="servico"><b>Serviço</b></label>
          <p>{{ $venda->servico->servico}}</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="valor"><b>Valor</b></label>
          <p>{{ 'R$ ' . number_format($venda->servico->valor, 2, ',', '.'); }}</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="valor"><b>Total c/ Desconto</b></label>
          <p>{{ 'R$ ' . number_format($venda->valor_final, 2, ',', '.'); }} </p>
        </div>
    </div>

    
    <div class="col-md-2">
        <div class="form-group">
          <label for="valor"><b>Data Venda</b></label>
          <p>{{  date('d/m/Y', strtotime($venda->data_venda)) }}</p>
        </div>
    </div>
    
    <div class="col-md-2">
        <div class="form-group">
          <label for="valor"><b>Data Vencimento</b></label>
          <p>{{  date('d/m/Y', strtotime($venda->data_vencimento)) }}</p>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        @if($venda->pago == 0)
            <div class="alert alert-danger">
                Venda está em aberto.
                button
            </div>
        @else
            <div class="alert alert-success">Venda paga.</div>
        @endif
    </div>
</div>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4t">
    <a href="{{ route('fatura', $venda->id) }}"  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm align-self-end ml-auto"><i
            class="fas fa-download fa-sm text-white-50"></i> Gerar PDF </a>
</div>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4t">
    <a href="#"  onclick="Convert_HTML_To_PDF();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm align-self-end ml-auto"><i
            class="fas fa-download fa-sm text-white-50"></i> Gerar PDF </a>
</div> -->

@endsection