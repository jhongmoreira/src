<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class Vendas extends Controller
{
    public function index(){
        $vendas = Venda::all();
        return view('venda.index', ['vendas'=>$venda]);
    }
}
