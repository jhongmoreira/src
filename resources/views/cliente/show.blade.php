@extends('layouts.main')
@section('title','Detalhe do Cliente - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12"><h3>{{ $cliente->nome}}</h3></div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
          <label for="cpf"><b>CPF</b></label>
          <p>{{$cliente->cpf}}</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="whatsapp"><b>WhatsApp</b></label>
          <div>
              <a href="https://wa.me/{{$cliente->whatsapp}}" target="_blank">{{$cliente->whatsapp}} <i class="fa fa-link"></i></a>
          </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="email"><b>E-mail</b></label>
          <p>{{$cliente->email}}</p>
        </div>
    </div>

</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="obs"><b>Observação</b></label>
            <p>{{$cliente->obs}}</p>
        </div>
    </div>
</div>
@endsection