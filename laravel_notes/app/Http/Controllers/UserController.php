<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');      // Para proteger el controlador
    }


    public function index(){
        $user = User::find(1);
        return view('relaciones', compact('user'));
    }
}
