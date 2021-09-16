<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

     /**
     * Un perfil tiene una localizacion (relacion: uno a uno)
     * 
     */
    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
