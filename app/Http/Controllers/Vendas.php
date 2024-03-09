<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Servico;
use App\Models\Cliente;

class Vendas extends Controller
{
    public function index(){
        $vendas = Venda::with('servico', 'cliente')->get();

        return view('venda.index', ['vendas'=>$vendas]);
    }

    public function create(){
        $clientes = Cliente::all();
        $servicos = Servico::all();

        return view('venda.create', ['clientes'=>$clientes, 'servicos'=>$servicos]);
    }

    public function store(Request $request){
        $venda = new Venda;
        $venda->cliente_id = $request->cliente;
        $venda->servico_id = $request->servico;
        $venda->valor_final = $request->valor_final;
        $venda->data_venda = $request->data_venda;
        $venda->data_vencimento = $request->data_vencimento;
        $venda->pago = $request->pago;

        $venda->save();

        toastr()->success('Venda lançada!');
        return back();
    }

    public function edit($id){
        $venda = Venda::findOrFail($id);

        $clientes = Cliente::all();
        $servicos = Servico::all();

        return view('venda.edit', ['venda'=>$venda, 'clientes'=>$clientes, 'servicos'=>$servicos]);
    }

    public function update(Request $request){
        $venda = Venda::findOrFail($request->id);
        $venda->cliente_id = $request->cliente;
        $venda->servico_id = $request->servico;
        $venda->valor_final = $request->valor_final;
        $venda->data_venda = $request->data_venda;
        $venda->data_vencimento = $request->data_vencimento;
        $venda->pago = $request->pago;
    
        $venda->save();
    
        toastr()->success('Venda atualizada!');
        return back();
    }

    public function delete($id){
        $venda = Venda::findOrFail($id);
        return view('venda.delete', ['venda'=>$venda]);
    }

    public function destroy($id){
        $venda = Venda::findOrFail($id)->delete();

        // return redirect('/')->with('msg', 'Cliente deletado com sucesso!');

        //Implementação com toastr
        toastr()->success('Registro deletado!');
        return redirect('/vendas');
        
    }

    public function show($id){
        $venda = Venda::with('servico', 'cliente')->findOrFail($id);

        return view('venda.show', ['venda'=>$venda]);
    }
    
}