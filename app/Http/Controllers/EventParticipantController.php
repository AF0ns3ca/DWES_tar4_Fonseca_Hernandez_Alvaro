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

    //Metodo store
    public function store(Request $request)
    {
        try{
            $event_participant = new EventParticipant();
            $event_participant->event_id = $request->input('event_id');
            $event_participant->participant_id = $request->input('participant_id');
            $event_participant->save();

            return response()->json($event_participant,201);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo show
    public function show($id)
    {
        $event_participant = EventParticipant::find($id);

        if(!$event_participant){
            return response()->json(['message' => 'El organizers no está'], 404);
        }
        else{
            return response()->json($event_participant, 200);
        }
    }

    //Metodo update
    public function update(Request $request, $id)
    {
        try{
            $event_participant = new EventParticipant();
            $event_participant->event_id = $request->input('event_id');
            $event_participant->participant_id = $request->input('participant_id');
            $event_participant->save();

            return response()->json($event_participant, 200);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo destroy
    public function destroy ($id) {
        $event_participant = EventParticipant::find($id);

        if(!$event_participant){
            return response()->json(['message' => 'El organizers no está'], 404);
        }
        else{
            $event_participant->delete();
            return response()->json(['message' => 'organizers eliminado'], 200);
        } 
    }
}
