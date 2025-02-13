@extends('layouts.main')
@section('title','Novo Cliente - Exata TI')
@section('content')

<div class="row">
    <div class="col-md-12"><h3>Editando {{ $cliente->nome }}</h3></div>
</div>

<form action="{{ route('update-cliente', $cliente->id) }}" method="post">
    @csrf

<div class="row">

    <div class="col-md-8">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control" value="{{ $cliente->nome }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="matricula">Matrícula</label>
          <input type="number" name="matricula" id="matricula" class="form-control" value="{{ $cliente->matricula }}">
        </div>
    </div>

</div>    

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="whatsapp">Whatsapp</label>
          <input type="number" name="whatsapp" id="whatsapp" class="form-control" value="{{ $cliente->whatsapp }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" class="form-control" value="{{ $cliente->email }}">
        </div>
    </div>
</div>   

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
                <label for="obs">Observação</label>
                <textarea name="obs" id="obs" rows="10" class="form-control">{{ $cliente->obs }}</textarea>
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