<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Un comentario Transformar a (polimorfico) (relacion: Transformar a morph)
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Un comentario pertenece a un usuario (relacion: pertenece a)
     */
    public function user()
    {
        return $this->belongsTo(User::class); // En la tabla comentario debemos tener user_id
    }
}
