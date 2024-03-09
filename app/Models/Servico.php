<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function vendas(): HasMany
    {
        return $this->hasMany(Venda::class, 'servico');
    }
}
