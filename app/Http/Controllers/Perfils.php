<?php

namespace App\Http\Controllers;
use App\Models\Perfil;

use Illuminate\Http\Request;

class Perfils extends Controller
{
    public function index(){
        return view('perfil.index',[]);
    }
}
