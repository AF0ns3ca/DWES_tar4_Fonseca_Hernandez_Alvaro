<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{

    //Relacion uno a muchos con tabla eventos
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    use HasFactory;

    
}
