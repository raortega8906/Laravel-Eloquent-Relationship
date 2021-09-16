<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Un post pertenece a un usuario (relacion: pertenece a)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un post pertenece a una categoria (relacion: pertenece a)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Un post tiene muchos comentarios (polimorfico) (relacion: tiene muchos morph)
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Un post tiene una imagen (polimorfico) (relacion: tiene uno morph)
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Un post pertenecen a muchas etiquetas (polimorfico) (relacion: pertenece a muchos morph) 
     * -> transformate para muchos
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
