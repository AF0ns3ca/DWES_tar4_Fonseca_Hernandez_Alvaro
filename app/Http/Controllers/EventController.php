<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    //
    //Metodos index, store, shor, update, destroy
    //Metodo index
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    //Metodo store
    public function store(Request $request)
    {
        try{
            $events = new Event();
            $events->organizer_id = $request->input('organizer_id');
            $events->nombre_evento = $request->input('nombre_evento');
            $events->fecha = $request->input('fecha');
            $events->ubicacion = $request->input('ubicacion');
            $events->save();

            return response()->json($events,201);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo show
    public function show($id)
    {
        $events = Event::find($id);

        if(!$events){
            return response()->json(['message' => 'El events no está'], 404);
        }
        else{
            return response()->json($events, 200);
        }
    }

    //Metodo update
    public function update(Request $request, $id)
    {
        try{
            $events = new Event();
            $events->oragnizer_id = $request->input('oragnizer_id');
            $events->nombre_evento = $request->input('nombre_evento');
            $events->fecha = $request->input('fecha');
            $events->ubicacion = $request->input('ubicacion');
            $events->save();

            return response()->json($events, 200);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo destroy
    public function destroy ($id) {
        $events = Event::find($id);

        if(!$events){
            return response()->json(['message' => 'El events no está'], 404);
        }
        else{
            $events->delete();
            return response()->json(['message' => 'events eliminado'], 200);
        } 
    }
}
