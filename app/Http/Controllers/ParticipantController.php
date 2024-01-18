<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;


class ParticipantController extends Controller
{
    //
     //Metodos index, store, shor, update, destroy
    //Metodo index
    public function index()
    {
        $participants = Participant::all();
        return response()->json($participants);
    }

    //Metodo store
    public function store(Request $request)
    {
        try{
            $participants = new Participant();
            $participants->nombre = $request->input('nombre');
            $participants->email = $request->input('email');
            $participants->save();

            return response()->json($participants,201);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo show
    public function show($id)
    {
        $participants = Participant::find($id);

        if(!$participants){
            return response()->json(['message' => 'El usuario no está'], 404);
        }
        else{
            return response()->json($participants, 200);
        }
    }

    //Metodo update
    public function update(Request $request, $id)
    {
        try{
            $participants = new Participant();
            $participants->nombre = $request->input('nombre');
            $participants->email = $request->input('email');
            $participants->save();

            return response()->json($participants, 200);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo destroy
    public function destroy ($id) {
        $participants = Participant::find($id);

        if(!$participants){
            return response()->json(['message' => 'El usuario no está'], 404);
        }
        else{
            $participants->delete();
            return response()->json(['message' => 'Usuario eliminado'], 200);
        } 
    }
}
