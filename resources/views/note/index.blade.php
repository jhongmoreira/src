@extends('layouts.main')
@section('title','Clientes - Exata TI')
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Nova Nota
                </h6>
            </div>

            <form action="{{ route('salvar-nota') }}">
                @csrf

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                                <textarea name="anotacao" id="anotacao" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group m-3">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

            </form>
        </div>

        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                   Todas as notas
                </h6>
            </div>
            
            @foreach($notes as $note)
                <div class="row p-3">
                    <div class="col-md-12">
                        <div>
                            {{$note->anotacao}}
                        </div>
                        <span style="font-size: 5px;">{{ $note->data_cad}}</span>
                        <hr>
                    </div>
                </div>
            @endforeach

        </div>

        </div>
    </div>

@endsection