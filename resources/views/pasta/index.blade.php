@extends('layouts.main')
@section('title','Pastas - Exata TI')
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
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($clientes as $cliente)                          
                            <tr>
                                <td><a href="{{ $cliente->pasta }}" target="_blank">{{ $cliente->nome }} </a></td>
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