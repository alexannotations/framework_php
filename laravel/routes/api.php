<?php

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;



Route::get('/user', function (Request $request){
    return new UserResource(User::find(1));
});