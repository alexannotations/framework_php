<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:users'], // el campo email debe ser unico en la tabla users
            'password'  => ['required', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),   // encripta la contraseña
        ]);

        return back();
    }


    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

}
