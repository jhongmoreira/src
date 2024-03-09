@extends('layouts.main')
@section('title','Novo Cliente - Exata TI')
@section('content')

<div class="row">
    <div class="col-md-12"><h3>Vender</h3></div>
</div>

<form action="{{ route('salvar-cliente') }}" method="post">
    @csrf

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="cliente">Cliente</label>
            <select name="cliente" id="cliente" class="form-control" required>
                <option value=""></option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
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
                    <option value="{{ $servico->id }}">{{ $servico->servico }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="valor_final">Valor</label>
          <input type="number" name="valor_final" id="valor_final" class="form-control">
        </div>
    </div>

</div>    

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="whatsapp">Whatsapp</label>
          <input type="number" name="whatsapp" id="whatsapp" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="pasta">Pasta do Drive</label>
          <input type="url" name="pasta" id="pasta" class="form-control">
        </div>
    </div>

</div>   

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <label for="obs">Observação</label>
                <textarea name="obs" id="obs" rows="10" class="form-control"></textarea>
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