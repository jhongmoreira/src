@extends('layouts.main')
@section('title','Detalhe do Cliente - Exata TI')
@section('content')

<div class="row">
    <h1>Ops!</h1>
</div>
<div class="row">
    <h3>Algo deu errado.</h3>
</div>
<div class="row">
    <div class="alert alert-danger">
        {{$errorMessage}}
    </div>
</div>
<div class="row">
    <p>Erros acontecem. Caso não saiba o que pode estar causando o erro acima, entre em contato com o administrador do sistema.</p>
</div>
@endsection