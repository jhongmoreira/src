<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class Notes extends Controller
{
   public function index(){
    $notes = Note::orderBy('id', 'DESC')->get();

    return view("note.index", ['notes'=>$notes]);
   }

   public function store(Request $request){
    $note = new Note;

    $note->data_cad = date('Y-m-d');
    $note->anotacao = $request->anotacao;

    $note->save();

    toastr()->success('Nota Salva.');
    return back();
   }

   public function destroy($id){
      $note = Note::findOrFail($id)->delete();

      toastr()->success('Nota Excluida.');
      return back();
   }
}
