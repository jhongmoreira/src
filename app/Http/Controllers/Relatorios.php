<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Order;

class Relatorios extends Controller
{
    public function index(){
        $atendimentos = Order::with('cliente')->get();

        return view('relatorio.index', ['atendimentos'=>$atendimentos]);
    }
}
