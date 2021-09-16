<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * Una imagen Transformar a (polimorfico) (relacion: Transformar a morph)
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
