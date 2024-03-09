@extends('layouts.main')
@section('title','Novo Cliente - Exata TI')
@section('content')

<div class="row">
    <div class="col-md-12"><h3>Nova Ordem</h3></div>
</div>

<form action="{{ route('update-ordem', $order->id) }}" method="post">
    @csrf

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" readonly>
                    <option value="{{ $order->cliente_id }}">{{ $order->cliente->nome }}</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="data_cadastro">Data</label>
          <input type="date" name="data_cadastro" id="data_cadastro" class="form-control" value="{{ $order->data_cadastro}}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="finalizado">Status</label>
            <select name="finalizado" id="finalizado" class="form-control" required>
                @if($order->finalizado == 0)
                    <option value="0" selected>Em Andamento</option>
                    <option value="1">Finalizado</option>
                @else
                    <option value="0">Em Andamento</option>
                    <option value="1" selected>Finalizado</option>
                @endif
            </select>
        </div>
    </div>

</div>   
 

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <label for="descricao">Observação</label>
                <textarea name="descricao" id="descricao" rows="10" class="form-control">{{ $order->descricao }}</textarea>
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