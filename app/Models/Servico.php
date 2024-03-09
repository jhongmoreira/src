<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'servico');
    }
}
