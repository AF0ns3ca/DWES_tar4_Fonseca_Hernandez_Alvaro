<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

class UserDetailController extends Controller
{
    //
    //Metodos index, store, shor, update, destroy
    //Metodo index
    public function index()
    {
        $user_detail = UserDetail::all();
        return response()->json($user_detail);
    }

    //Metodo store
    public function store(Request $request)
    {
        try{
            //Validaciones
            $request->validate([
                'user_id' => 'required|integer',
                'direccion' => 'required|string',
                'telefono' => 'required|string'
            ]);
            $user_detail = new UserDetail();
            $user_detail->user_id = $request->input('user_id');
            $user_detail->direccion = $request->input('direccion');
            $user_detail->telefono = $request->input('telefono');
            $user_detail->save();

            return response()->json($user_detail,201);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo show
    public function show($id)
    {
        $user_detail = UserDetail::find($id);

        if(!$user_detail){
            return response()->json(['message' => 'El usuario no está'], 404);
        }
        else{
            return response()->json($user_detail, 200);
        }
    }

    //Metodo update
    public function update(Request $request, $id)
    {
        try{
            //Validaciones
            $request->validate([
                'user_id' => 'required|integer',
                'direccion' => 'required|string',
                'telefono' => 'required|string'
            ]);
            $user_detail = UserDetail::find($id);
            $user_detail->user_id = $request->input('user_id');
            $user_detail->direccion = $request->input('direccion');
            $user_detail->telefono = $request->input('telefono');
            $user_detail->save();

            return response()->json($user_detail, 200);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo destroy
    public function destroy ($id) {
        $user_detail = UserDetail::find($id);

        if(!$user_detail){
            return response()->json(['message' => 'El usuario no está'], 404);
        }
        else{
            $user_detail->delete();
            return response()->json(['message' => 'Usuario eliminado'], 200);
        } 
    }
}
