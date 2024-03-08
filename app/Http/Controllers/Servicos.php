<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class Servicos extends Controller
{

    public function index(){
        $servicos = Servico::all();
        return view("servico.index",['servicos'=>$servicos]);
    }

    public function create(){
        return view('servico.create', []);
    }

    public function store(Request $request){
        $servico = new Servico;
        $servico->servico = $request->servico;
        $servico->valor = $request->valor;

        $servico->save();

        // return redirect('/')->with('msg','Registro salvo com sucesso.');

        //Implmenetação com toastr
        toastr()->success('Registro salvo com sucesso!');
        return back();

    }

    public function edit($id){
        $servico = Servico::findOrFail($id);

        return view('servico.edit', ['servico' => $servico ]);
    }

    public function update(Request $request){
        $data = $request->all();
        
        Servico::findOrFail($request->id)->update($data);
 
        // return redirect('/')->with('msg', 'Cliente atualizado com sucesso!');

        //Implementação com toastr
        toastr()->success('Registro atualizado!');
        return redirect('/servicos');

    }


}
