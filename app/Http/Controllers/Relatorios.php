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

    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $atendimentos = Order::whereBetween('data_cadastro', [$startDate, $endDate])->get();

        return view('relatorio.index', ['atendimentos'=>$atendimentos]);
    
}

}
