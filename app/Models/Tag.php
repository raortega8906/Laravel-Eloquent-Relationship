<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Muchos Etiquetas tienen muchas etiquetas (polimorfico) (relacion: muchos a muchos morph)
     * -> transformado para muchos
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    /**
     * Muchos videos tienen muchas etiquetas (polimorfico) (relacion: muchos a muchos morph)
     */
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
