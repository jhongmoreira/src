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
            <div class="row p-3">            
                @foreach($notes as $note)
                <div class="col-md-2 border border-secondary m-2" style="background-color: #FFFF88;">
                    <form action="{{ route('deletar-nota', $note->id) }}" method="POST" class="p-1">
                        @csrf
                        <small class="text-dark font-weight-light">{{ $note->data_cad}}</small>
                        <div>
                            {{$note->anotacao}}
                        </div>
                        <button type="submit" class="btn btn-sm btn-note"><i class="fa fa-ban"></i></button>
                    </form>
                    </div>
                @endforeach
            </div>  

        </div>

        </div>
    </div>

@endsection