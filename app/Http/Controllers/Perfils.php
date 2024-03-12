<?php

namespace App\Http\Controllers;
use App\Models\Perfil;
use App\Models\Empresa;

use Illuminate\Http\Request;

class Perfils extends Controller
{
    public function index(){
        $empresas = Empresa::findOrFail(1);

        return view('perfil.index',['empresas'=>$empresas]);
    }

    public function update(Request $request){
        $perfil = Empresa::findOrFail(1);
        $perfil->nome_empresa = $request->nome;
        $perfil->identificacao = $request->identificacao;
        $perfil->telefone = $request->telefone;
        $perfil->email = $request->email;
        $perfil->pix = $request->pix;

        $perfil->save();    
   
        toastr()->success('Dados da empresa atualizados');
        return back();
    }
}
