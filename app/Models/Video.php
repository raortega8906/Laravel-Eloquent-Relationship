<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * Un video pertenece a un usuario (relacion: pertenece a)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un video pertenece a una categoria (relacion: pertenece a)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Un video tiene muchos comentarios (polimorfico) (relacion: tiene muchos morph)
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Un video tiene una imagen (polimorfico) (relacion: tiene uno morph)
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Muchos videos pertenecen muchas etiquetas (polimorfico) (relacion: muchos a muchos morph)
     * -> transformate para muchos
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
