<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function login(Request $request)
   {

      // validar datos (email . password)
      $credentials = $request->validate([
         "email" => "required|email|string",
         "password" => "required|string"
      ]);
      // verificar en la basa de datos
      if (!Auth::attempt($credentials)) {

         return response()->json([
            "mensaje" => "creneciales incorrectos"
         ], 401);
      }

      // authentica
      //return $request->user();
      $user = $request->user();

      // generar token
      $tokenResult = $user->createToken('Token de acceso');
      $token = $tokenResult->plainTextToken;


      // responder  jii
      return response()->json([
         "accessToken" => $token,
         "token_type" => "bearer",
         "user" => $user
      ]);
   }

   public function registrar(Request $request)
   {
      //Validar  -  jizarra 19.09.2023

      $request->validate([

         "name" => "required",
         "email" => "required|email|unique:users",
         "password" => "required"

      ]);
      //Guardar  jizarra  o esta modifcados 19.09.2023

      $usuario = new User;

      $usuario->name = $request->name;
      $usuario->email = $request->email;
      $usuario->password = bcrypt($request->password);
      $usuario->save();
      //Responder
      return response()->json([
         
         "mensaje" => "Usuario Registrado. git",
         "status" => 1
      ], 201);
   }

   public function perfil(Request $request)
   {
      return response()->json($request->user());
   }
   public function salir(Request $request)
   {
      $request->user()->tokens()->delete();
      return response()->json([
         "mensaje" => "Logout"
      ]);

   }
}
