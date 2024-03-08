@extends('layouts.main')
@section('title','Novo Cliente - Exata TI')
@section('content')

<div class="row">
    <div class="col-md-12"><h3>Novo Cliente</h3></div>
</div>

<div class="row">

    <div class="col-md-8">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="cpf">CPF</label>
          <input type="number" name="cpf" id="cpf" class="form-control">
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
        <a href="#" class="btn btn-primary form-control">Cadastrar</a>
    </div>
</div>
@endsection