<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Order;

class Relatorios extends Controller
{
    public function index(){
        $atendimentos = Order::with('cliente')->whereDate('data_cadastro', now()->toDateString())->get();

        return view('relatorio.index', ['atendimentos'=>$atendimentos]);
    }

    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $atendimentos = Order::whereBetween('data_cadastro', [$startDate, $endDate])->get();
        $totalAtendimento = $atendimentos->count();

        return view('relatorio.index', ['atendimentos'=>$atendimentos, 'startDate' => $startDate, 'endDate' => $endDate, 'totalAtendimentos'=>$totalAtendimento]);
    
}

}