<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class, "servico");
    }

}
