@extends('layouts.main')
@section('title','Novo Cliente - Exata TI')
@section('content')

<div class="row">
    <div class="col-md-12"><h3>Nova Ordem</h3></div>
</div>

@if ($errors->any())
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<form action="{{ route('salvar-ordem') }}" method="post">
    @csrf

<div class="row">

    <div class="col-md-5">
        <div class="form-group">
            <label for="cliente_id">Contato</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="data_cadastro">Data</label>
          <input type="date" name="data_cadastro" id="data_cadastro" class="form-control">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="hora_cadastro">Hora</label>
          <input type="time" name="hora_cadastro" id="hora_cadastro" class="form-control">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="finalizado">Status</label>
            <select name="finalizado" id="finalizado" class="form-control" required>
                <option value="0">Não iniciado</option>
                <option value="1">Em Andamento</option>
                <option value="3">Finalizado</option>
            </select>
        </div>
    </div>

</div>   
 

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <label for="descricao">Observação</label>
                <textarea name="descricao" id="descricao" rows="10" class="form-control"></textarea>
        </div>
    </div>
</div>     

<div class="row">
    <div class="col-md-3">
        <button class="form-control btn btn-primary" type="submit">Cadastrar</button>
    </div>
</div>
</form>
@endsection