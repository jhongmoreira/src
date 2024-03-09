@extends('layouts.main')
@section('title','Editar Venda - Exata TI')
@section('content')

<div class="row">
    <div class="col-md-12"><h3>Editar Venda #{{ $venda->id}}</h3></div>
</div>

<form action="{{ route('update-venda', $venda->id) }}" method="post">
    @csrf

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="cliente">Cliente</label>
            <select name="cliente" id="cliente" class="form-control" required>
                <option value=""></option>
                @foreach($clientes as $cliente)
                    @if ($venda->cliente_id == $cliente->id)
                        <option value="{{ $cliente->id }}" selected>{{ $cliente->nome }}</option>
                    @else
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="servico">Serviço</label>
            <select name="servico" id="servico" class="form-control" required>
                <option value=""></option>
                @foreach($servicos as $servico)
                    @if ($venda->servico_id == $servico->id)                        
                        <option value="{{ $servico->id }}" selected>{{ $servico->servico }}</option>
                    @else
                        <option value="{{ $servico->id }}">{{ $servico->servico }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="valor_final">Valor</label>
          <input type="number" name="valor_final" id="valor_final" class="form-control" value="{{ $venda->valor_final}}">
        </div>
    </div>

</div>    

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="data_venda">Data Venda</label>
          <input type="date" name="data_venda" id="data_venda" class="form-control" value="{{ $venda->data_venda}}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="data_vencimento">Data Vencimento</label>
          <input type="date" name="data_vencimento" id="data_vencimento" class="form-control" value="{{ $venda->data_vencimento}}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="pago">Pago</label>
            <select id="pago" name="pago" class="form-control" required>
                <option value=""></option>
                <option value="1" {{ $venda->pago == 1 ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ $venda->pago == 0 ? 'selected' : '' }}>Não</option>
            </select>
        </div>
    </div>

</div>   

<div class="row">
    <div class="col-md-3">
        <button class="form-control btn btn-warning" type="submit">Atualizar</button>
    </div>
</div>
</form>
@endsection