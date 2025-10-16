<?php
/**
 *  Login Manual en API con Autenticación de Usuarios
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;    // maneja los inicios de sesión


class LoginController extends Controller
{

    // Regresa un bearer token sin encriptar si el login es correcto
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email','password'))) {
            return response()->json([
                'message' => 'Login correcto',
                'token' => $request->user()->createToken($request->name)->plainTextToken
            ], 200);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }


    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',   // nombre del dispositivo que se conecta
        ]);
    }

}
