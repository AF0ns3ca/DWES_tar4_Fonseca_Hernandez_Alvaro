<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;

class OrganizerController extends Controller
{
    //
    //Metodos index, store, shor, update, destroy
    //Metodo index
    public function index()
    {
        $organizers = Organizer::all();
        return response()->json($organizers);
    }

    //Metodo store
    public function store(Request $request)
    {
        try{
            //Validaciones
            $request->validate([
                'nombre' => 'required|string',
                'contacto' => 'required|string'
            ]);
            $organizers = new Organizer();
            $organizers->nombre = $request->input('nombre');
            $organizers->contacto = $request->input('contacto');
            $organizers->save();

            return response()->json($organizers,201);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo show
    public function show($id)
    {
        $organizers = Organizer::find($id);

        if(!$organizers){
            return response()->json(['message' => 'El organizers no está'], 404);
        }
        else{
            return response()->json($organizers, 200);
        }
    }

    //Metodo update
    public function update(Request $request, $id)
    {
        try{
            //Validaciones
            $request->validate([
                'nombre' => 'required|string',
                'contacto' => 'required|string'
            ]);
            $organizers = Organizer::find($id);
            $organizers->nombre = $request->input('nombre');
            $organizers->contacto = $request->input('contacto');
            $organizers->save();

            return response()->json($organizers, 200);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo destroy
    public function destroy ($id) {
        $organizers = Organizer::find($id);

        if(!$organizers){
            return response()->json(['message' => 'El organizers no está'], 404);
        }
        else{
            $organizers->delete();
            return response()->json(['message' => 'organizers eliminado'], 200);
        } 
    }
}
