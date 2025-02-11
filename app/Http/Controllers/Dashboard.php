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
        $order = Order::where('finalizado', 0)->orWhere('finalizado', 1)->count();
        $orderOk = Order::where('finalizado', 2)->count();
        
        $dataAtual = date('Y-m-d'); // Obtém a data atual no formato 'YYYY-MM-DD'
        $orderToday = Order::whereDate('data_cadastro', $dataAtual)->count();

        $somaVendas = Venda::select([
            \DB::raw('DAY(data_venda) as dia'),
            \DB::raw('SUM(valor_final) as total')
        ])->groupBy('dia')->orderBy('dia', 'asc')->get();;

        $data[] = '';
        $valor[] = '';

        foreach($somaVendas as $soma){
            $data[] = $soma->dia;
            $valor[] = $soma->total;
        }

        $tempo = implode(",", $data);
        $somaTotal = implode(",", $valor);

        return view('welcome',['caixa'=>$caixa, 'vencer'=>$vencer, 'order'=>$order, 'orderOk'=>$orderOk, 'orderToday'=>$orderToday, 'tempo'=>$tempo, 'somaTotal'=>$somaTotal]);
    }
}