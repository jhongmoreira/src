<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class Pastas extends Controller
{
    public function index(){

        $clientes = Cliente::all();

        return view('pasta.index', ['clientes'=>$clientes]);
    }
}
