<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Order;


class Dashboard extends Controller
{
    public function index(){
        $caixa = Venda::where('pago', 1)->sum('valor_final');
        $vencer = Venda::where('pago', 0)->sum('valor_final');
        $order = Order::where('finalizado', 0)->count();
        $orderOk = Order::where('finalizado', 1)->count();
        $vendaVencida = Venda::where('data_vencimento','<=', date('Y-m-d'))->where('pago', 0)->count();

        return view('welcome',['caixa'=>$caixa, 'vencer'=>$vencer, 'order'=>$order, 'orderOk'=>$orderOk, 'vendaVencida'=>$vendaVencida]);
    }
}
