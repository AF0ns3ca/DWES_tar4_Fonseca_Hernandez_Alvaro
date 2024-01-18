<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    //Relacion uno a muchos con tabla organizadores
    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    //Relacion muchos a muchos con tabla participantes
    public function participants()
    {
        return $this->belongsToMany(Participant::class);
    }

    use HasFactory;

   
}
