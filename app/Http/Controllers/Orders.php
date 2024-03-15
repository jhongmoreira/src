<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Order;

class Orders extends Controller
{
    
    public function index(){
        $orders = Order::with('cliente')->get();

        return view('ordem.index', ['orders'=>$orders]);
    }

    public function indexAbertas(){
        $orders = Order::with('cliente')->where('finalizado', 0)->orWhere('finalizado', 1)->get();

        return view('ordem.index', ['orders'=>$orders]);
    }

    public function indexFechadas(){
        $orders = Order::with('cliente')->where('finalizado', 2)->get();

        return view('ordem.index', ['orders'=>$orders]);
    }

    public function create(){
        $clientes = Cliente::all();

        return view("ordem.create",['clientes'=>$clientes]);
    }

    public function store(Request $request):RedirectResponse{

        $validated = $request->validate([
            'cliente_id' => 'required',
            'data_cadastro' => 'required',
            'finalizado' => 'required',
            'descricao' => 'required',
        ]);

        $ordem = new Order;
        $ordem->cliente_id = $request->cliente_id;
        $ordem->data_cadastro = $request->data_cadastro;
        $ordem->finalizado = $request->finalizado;
        $ordem->descricao = $request->descricao;


        $ordem->save();

        toastr()->success('Ordem criada!');

        return to_route('nova-ordem');
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
   
        toastr()->success('Status atualizado.');
        return redirect('/ordens');
    }
}
