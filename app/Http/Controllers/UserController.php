<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    //Metodos index, store, shor, update, destroy
    //Metodo index
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    //Metodo store
    public function store(Request $request)
    {
        try{
            $users = new User();
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->password = $request->input('password');
            $users->save();

            return response()->json($users,201);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo show
    public function show($id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'El usuario no está'], 404);
        }
        else{
            return response()->json($user, 200);
        }
    }

    //Metodo update
    public function update(Request $request, $id)
    {
        try{
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password'); 
            $user->save();

            return response()->json($user, 200);

        } catch (\Exception $e){    
            return response()->json(['error' => 'Error'], 500);
        }
    }

    //Metodo destroy
    public function destroy ($id) {
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'El usuario no está'], 404);
        }
        else{
            $user->delete();
            return response()->json(['message' => 'Usuario eliminado'], 200);
        } 
    }
}
