@extends('layouts.main')
@section('title','Novo Cliente - Exata TI')
@section('content')

<div class="row">
    <div class="col-md-12"><h3>Editando {{ $servico->servico }}</h3></div>
</div>

<form action="{{ route('update-servico', $servico->id) }}" method="post">
    @csrf

<div class="row">

<div class="col-md-6">
        <div class="form-group">
          <label for="servico">Descrição do Servico</label>
          <input type="text" name="servico" id="servico" class="form-control" value="{{$servico->servico}}">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="valor">Valor</label>
          <input type="number" name="valor" id="valor" class="form-control" value="{{$servico->valor}}">
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