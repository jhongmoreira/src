@extends('layouts.main')
@section('title','Detalhe do Cliente - Exata TI')
@section('content')

<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Dados do usuário logado
                </h6>
            </div>

            <div class="card-body"> 
                
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="cpf"><b>Nome</b></label>
                    <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>   
    
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="cpf"><b>E-mail</b></label>
                    <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>                           
            </div>


            </div>
</div>

@endsection