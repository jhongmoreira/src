<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cliente;


class Clientes extends Controller
{
    public function index(){

        $search = request('buscar');

        if ($search){
            $clientes = Cliente::where('nome', 'like', '%' . $search . '%')->get();
        }else{
            $clientes = Cliente::all();
        }

        return view('cliente.index',['clientes'=>$clientes]);
    }

    public function create(){
        return view('cliente.create',[]);
    }

    public function store(Request $request){
        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->matricula = $request->matricula;
        $cliente->whatsapp = $request->whatsapp;
        $cliente->email = $request->email;
        $cliente->obs = $request->obs;

        $cliente->save();

        //Implmenetação com toastr
        toastr()->success('Cliente cadastrado.');
        return back();

    }

    public function show($id){
        
        // $cliente = Cliente::findOrFail($id);
        $cliente = Cliente::with('orders')->findOrFail($id);

        return view('cliente.show', ['cliente'=>$cliente]);
    }

    public function edit($id){
        $cliente = Cliente::findOrFail($id);

        return view('cliente.edit', ['cliente' => $cliente ]);
    }

    public function update(Request $request){
        $data = $request->all();
        
        Cliente::findOrFail($request->id)->update($data);
 
        // return redirect('/')->with('msg', 'Cliente atualizado com sucesso!');

        //Implementação com toastr
        toastr()->success('Registro atualizado!');
        return back();

    }

    public function delete($id){
        $cliente = Cliente::findOrFail($id);
        return view('cliente.delete', ['cliente'=>$cliente]);
    }

    public function destroy($id){
        $cliente = Cliente::findOrFail($id)->delete();

        // return redirect('/')->with('msg', 'Cliente deletado com sucesso!');

        //Implementação com toastr
        toastr()->success('Registro deletado!');
        return redirect('/clientes');
        
    }
}
