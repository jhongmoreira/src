<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kanban;
use App\Models\User;

class Kanbans extends Controller
{
    public function index(Request $request, $kbn) {
        // $kanbans = Kanban::with('usuario, $kbn' )->get();
        $kanbans = Kanban::with('usuario') // Carrega o relacionamento 'usuario'
             ->where('kanban_id', $kbn) // Aplica um filtro baseado em $kbn
             ->get();
        
        return view("kanban.index", ['kanbans' => $kanbans, 'kbn' => $kbn]);
    }
    


    public function store(Request $request){

        $kanban = new Kanban;

        $kanban->mensagem = $request->descricao;
        $kanban->status = $request->status;
        $kanban->id_usuario = \Auth::id();
        $kanban->kanban_id = $request->kanban_id;


        $kanban->save();

        toastr()->success('Quadro cadastrado.');
        return back();
    }

    public function save(Request $request){
        $kanban = new Kanban;
        
        $kanban->mensagem = $request->descricao;
        $kanban->status = $request->status;
        $kanban->id_usuario = \Auth::id();

        $kanban->save();

        toastr()->success('Quadro cadastrado.');
        return back();
    }

    public function prosseguir(Request $request){
        $kanban = Kanban::findOrFail($request->id);
        $kanban->status = 2;

        $kanban->save();    

        return back();
    }

    public function parar(Request $request){
        $kanban = Kanban::findOrFail($request->id);
        $kanban->status = 0;

        $kanban->save();    
           
        return back();
    }

    public function concluir(Request $request){
        $kanban = Kanban::findOrFail($request->id);
        $kanban->status = 1;

        $kanban->save();    
           
        return back();
    }
}
