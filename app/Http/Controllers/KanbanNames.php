<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KanbanName;

class KanbanNames extends Controller
{
    public function index(){
        $kanbans = KanbanName::orderBy('id', 'DESC')->get();
        
        return view("kanbans.index", ['kanbans'=>$kanbans]);
    }

    public function store(Request $request){
        $kanban = new KanbanName;
        
        $kanban->name = $request->name;
        $kanban->date_create = $request->date_create;

        $kanban->save();

        toastr()->success('Kanban cadastrado.');
        return back();
    }
}
