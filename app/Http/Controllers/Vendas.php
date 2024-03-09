<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Servico;
use App\Models\Cliente;

class Vendas extends Controller
{
    public function index(){
        $vendas = Venda::all();

        foreach ($vendas as $venda){
            $servico = Servico::find($venda->servico);
            $cliente = Cliente::find($venda->cliente);
        }


        return view('venda.index', ['vendas'=>$vendas, 'servico'=>$servico, 'cliente'=>$cliente]);
    }
}
