<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Cliente;
use App\Models\Servico;

class Venda extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class, "servico_id");
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

}
