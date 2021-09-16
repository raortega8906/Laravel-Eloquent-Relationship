<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Una categoria tiene muchos posts (Relacion: uno a muchos)
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Una categoria tiene muchos videos (Relacion: uno a muchos)
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
