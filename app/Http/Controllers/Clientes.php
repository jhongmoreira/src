<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Clientes extends Controller
{
    //
    public function index(){
        return view('cliente.create',[]);
    }
}
