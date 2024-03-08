@extends('layouts.main')
@section('title','Novo Cliente - Exata TI')
@section('content')

<div class="row">
    <div class="col-md-12"><h3>Novo Serviço</h3></div>
</div>

<form action="{{ route('salvar-servico') }}" method="post">
    @csrf

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
          <label for="servico">Descrição do Servico</label>
          <input type="text" name="servico" id="servico" class="form-control">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="valor">Valor</label>
          <input type="number" name="valor" id="valor" class="form-control">
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