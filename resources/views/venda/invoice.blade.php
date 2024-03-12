@extends('layouts.main')
@section('title','Detalhes da Venda - Exata TI')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Faturamento</h1>
    <a href="#"  onclick="Convert_HTML_To_PDF();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Baixar fatura</a>
</div>

<div id="relatorio">

<div class="row">
    <div class="col-md-12"><h3>{{ $venda->cliente->nome}}</h3></div>
</div>
<div class="row">
    <div class="col-md-12"><h5>Fatura #{{ $venda->id}}</h5></div>
</div>

<div class="row">
    <div class="col-md-12">

    </div>
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
              {{ $venda->cliente->whatsapp}}
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

    <div class="col-md-6">
        <div class="form-group">
          <label for="prestador"><b>Prestador do Serviço:</b></label>
          <p>{{ $empresa->nome_empresa}}</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="telefone"><b>Telefone</b></label>
          <p>{{ $empresa->telefone }}</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="cpf"><b>E-mail</b></label>
          <p>{{ $empresa->email }}</p>
        </div>
    </div>
    
</div>

<div class="row">

    <div class="col-md-3">
        <div class="form-group">
          <label for="forma"><b>Forma de Pagamento:</b></label>
          <p>PIX/Transferência</p>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
          <label for="telefone"><b>Chave PIX:</b></label>
          <p>{{ $empresa->pix }}</p>
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

    <div class="col-md-2">
        <div class="form-group">
          <label for="valor"><b>Valor</b></label>
          <p>{{ 'R$ ' . number_format($venda->servico->valor, 2, ',', '.'); }}</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="valor"><b>Desconto</b></label>
          <p>{{ 'R$ ' . number_format($venda->servico->valor-$venda->valor_final, 2, ',', '.'); }}</p>
        </div>
    </div>

</div>

<hr>

<div class="row">
    <div class="col-md-5 text-center">
        @if($venda->pago == 0)
            <div class="alert alert-danger">
                <b>Em Aberto.</b>
                <p>Informações geradas em {{ $ldate = date('d/m/Y H:i:s') }}</p>
            </div>
        @else
            <div class="alert alert-success">
                <b>Pago</b>
                <p>Informações geradas em {{ $ldate = date('d/m/Y H:i:s') }}</p>
            </div>
        @endif
    </div>
    <div class="col-md-5"></div>
    <div class="col-md-2 alert">
        <div class="form-group">
            <label for="cpf"><b>Total Final</b></label>
            <h3>{{ 'R$ ' . number_format($venda->valor_final, 2, ',', '.'); }}</h3>
        </div>
    </div>
</div>

</div>

@endsection