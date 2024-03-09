@extends('layouts.main')
@section('title','Apagar Venda - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12"><h3>Venda #{{ $venda->id}}</h3></div>
</div>

<hr>

<div class="row">
    <h1>Deseja realmente apagar a venda acima?</h1>
</div>

<form action="{{ route('delete-venda', $venda->id) }}" method="post">
    @csrf
    <div class="row">    
        <div class="col-md-4 mt-2">
            <button type="submit" class="form-control btn btn-danger">Sim, desejo apagar</button>
        </div>
        <div class="col-md-4 mt-2">
            <a href="{{ route('home') }}" class="form-control btn btn-success">Cancelar</a>
        </div>
    </div>
</form>


@endsection