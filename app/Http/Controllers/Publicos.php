<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publico;
use App\Models\Venda;

class Publicos extends Controller
{
    public function index(){

        $cpf = request('buscar');

        $vendas = null;

        
        if ($cpf){
            $vendas = Venda::with('servico', 'cliente')
            ->whereHas('cliente', function ($query) use ($cpf) {
                $query->where('cpf', $cpf);
            })
            ->get();
        }

        return view('query',['vendas'=>$vendas]);
    }
}
