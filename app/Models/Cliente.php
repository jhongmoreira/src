<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Cliente extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $guarded = [];  

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'cliente_id');
    }

    public function servicos(): HasMany
    {
        return $this->hasMany(Venda::class, 'servico_id');
    }

}
