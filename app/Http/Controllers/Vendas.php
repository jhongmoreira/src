<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Servico;

class Vendas extends Controller
{
    public function index(){
        $vendas = Venda::all();
        $servicos = Servico::all();
        return view('venda.index', ['vendas'=>$vendas, 'servicos'=>$servicos]);
    }
}
