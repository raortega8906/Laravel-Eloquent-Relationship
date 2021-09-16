<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * Un Grupo pertenece a muchos usuarios (relacion: pertenece y tiene a muchos)
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
