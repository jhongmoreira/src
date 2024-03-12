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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Empresa
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('perfil-salvar', $empresas->id) }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{$empresas->nome_empresa}}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="identificacao">Identificação</label>
                        <input type="number" name="identificacao" id="identificacao" class="form-control" value="{{$empresas->identificacao}}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="number" name="telefone" id="telefone" class="form-control" value="{{$empresas->telefone}}">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="chave_pix">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$empresas->email}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pix">Chave PIX</label>
                        <input type="text" name="pix" id="pix" class="form-control" value="{{$empresas->pix}}">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3">
                    <button class="form-control btn btn-warning" type="submit">Atualizar</button>
                </div>
            </div>
        </form>


    </div>
</div>

@endsection