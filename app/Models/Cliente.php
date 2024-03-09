<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $guarded = [];  

    // public function vendas(): HasMany
    // {
    //     return $this->hasMany(Venda::class, 'cliente');
    // }

}
