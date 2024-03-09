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

        return view('venda.create', ['clientes'=>$clientes]);
    }
}
