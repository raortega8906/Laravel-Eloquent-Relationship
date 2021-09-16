<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Un usuario tiene un perfil (relacion: uno a uno)
     * 
     * hasOne(): Si accedo a un usuario y utilizo del método 
     * profile puedo acceder a todas las columnas de la tabla profile
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Un usuario pertenece a un perfil (relacion: pertenece a)
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Un usuario pertenece a muchos grupos (relacion: pertenece y tiene muchos)
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    /**
     * Un usuario tiene Una localizacion a traves de un perfil (relacion: uno tiene atraves de)
     */
    public function location()
    {
        return $this->hasOneThrough(Location::class, Profile::class);
    }

    /**
     * Un usuario tiene muchos posts (Relacion: uno a muchos)
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Un usuario tiene muchos videos (Relacion: uno a muchos)
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    /**
     * Un usuario tiene muchos comentarios (Relacion: uno a muchos)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Un usuario tiene una imagen (polimorfico) (relacion: tiene uno morph)
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
