<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kanban extends Model
{
    use HasFactory;

    public function usuario(): belongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
