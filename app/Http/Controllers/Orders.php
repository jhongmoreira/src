<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Order;

class Orders extends Controller
{
    
    public function index(){
        $orders = Order::with('cliente')->get();

        return view('ordem.index', ['orders'=>$orders]);
    }

    public function create(){
        $clientes = Cliente::all();

        return view("ordem.create",['clientes'=>$clientes]);
    }

    public function store(Request $request){
        $ordem = new Order;
        $ordem->cliente_id = $request->cliente_id;
        $ordem->data_cadastro = $request->data_cadastro;
        $ordem->finalizado = $request->finalizado;
        $ordem->descricao = $request->descricao;


        $ordem->save();

        toastr()->success('Ordem criada!');
        return back();
    }

    public function edit($id){
        $order = Order::with('cliente')->findOrFail($id);
        return view('ordem.edit',['order'=>$order]);
    }

    public function update(Request $request){
        $ordem = Order::findOrFail($request->id);
        $ordem->cliente_id = $request->cliente_id;
        $ordem->data_cadastro = $request->data_cadastro;
        $ordem->finalizado = $request->finalizado;
        $ordem->descricao = $request->descricao;

        $ordem->save();    
   
        toastr()->success('Status atualizado!');
        return redirect('/ordens');
    }
}
