@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Whatsapp</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Whatsapp</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td><a href="{{ route('cliente', $cliente->id) }}">{{ $cliente->nome }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td><a href="https://wa.me/+55{{$cliente->whatsapp}}" target="_blank">{{$cliente->whatsapp}}</a></td>
                                <td>
                                    <a href="{{ $cliente->pasta }}" target="_blank" class="btn btn-sm btn-secondary mt-1"><i class="fa fa-folder"></i></a>
                                    <a href="{{ route('editar-cliente', $cliente->id) }}" class="btn btn-sm btn-warning mt-1"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('apagar-cliente', $cliente->id) }}" class="btn btn-sm btn-danger mt-1"><i class="fa fa-ban"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
            </div>
</div>

        </div>
    </div>
@endsection