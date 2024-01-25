<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventParticipant;

class EventParticipantController extends Controller
{
    //
    //Metodos index, store, shor, update, destroy
    //Metodo index
    public function index()
    {
        $event_participant = EventParticipant::all();
        return response()->json($event_participant);
    }

}
