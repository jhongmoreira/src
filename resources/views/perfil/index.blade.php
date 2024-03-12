@extends('layouts.main')
@section('title','Detalhe do Cliente - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12"><h3>Usuário</h3></div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="cpf"><b>CPF</b></label>
          <p>{{ Auth::user()->name }}</p>
        </div>
    </div

</div>
@endsection