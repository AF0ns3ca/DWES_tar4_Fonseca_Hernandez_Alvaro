<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    //Relacion muchos a muchos con tabla eventos
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
    
    use HasFactory;
    
}
