<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    /**
     * Un nivel tiene muchos usuarios (Relacion: uno a muchos)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Un nivel tiene muchos post a traves de muchos usuarios (relacion: muchos tiene atraves de muchos)
     */
    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
    }

    /**
     * Un nivel tiene muchos videos a traves de muchos usuarios (relacion: muchos tiene atraves de muchos)
     */
    public function variant_date_from_timestamp()
    {
        return $this->hasManyThrough(Video::class, User::class);
    }
}
