<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    use HasFactory;

    //Forzamos el reconocimiento del nombre de la tabla
    protected $table = 'event_participant';

    protected $fillable = [
        'event_id',
        'participant_id',
    ];

}
