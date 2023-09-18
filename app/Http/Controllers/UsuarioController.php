<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Foundation\Auth\User as AuthUser;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        //        $users = User::paginate(10);
        $users = User::orwhere('email','like','%'.$request->q.'%')->paginate(10);
        return response()->json($users, 200);
    }
    public function store(Request $request)
    {
        //Validar  jizarra  18.09.2023
        $request->validate([
            "name" => "required",
            "email" => "required|unique:users",
            "password" => "required"
        ]);
        //Registar  jizarra    18.09.2023
        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        //Responder     18.09.2023
        return response()->json([
            "mensaje" => "Usuario Registrado",
            "status" => 1,
            "error" => false], 201);
    }
     public function show($id)
    {
        $usuario=User::find($id);
        return response()->json($usuario, 200);
    }
     public function update(Request $request, $id)
    {
         // validar    18.09.2023
         $request->validate([
            "name" => "required",
            "email" => "required|unique:users,email,$id"
        ]);
        //Buscamos y Modificamos
        $usuario=User::find($id);
     
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($usuario->password){
            $usuario->password = bcrypt($request->password);
        }
        $usuario->save();
        //Responder
        return response()->json([
            "mensaje" => "Usuario Actualizado",
            "status" => 1,
            "error" => false], 200);
    }
    public function destroy( $id)
    {
        $usuario = User::find($id);
        $usuario->delete();
          //Responder
          return response()->json([
            "mensaje" => "Usuario Eliminado",
            "status" => 1,
            "error" => false], 200);
    }
}
