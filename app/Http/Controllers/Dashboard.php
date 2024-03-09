<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;


class Dashboard extends Controller
{
    public function index(){
        $caixa = Venda::where('pago', 1)->sum('valor_final');
        $vencer = Venda::where('pago', 0)->sum('valor_final');

        return view('welcome',['caixa'=>$caixa, 'vencer'=>$vencer]);
    }
}
