<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function formRegister(){
        return view('login.register');
    }

    public function userRegister(Request $request){

        $user = new user();

        $user->name = $request->usuario;
        $user->email = $request->correo;
        /* $user->email_verified_at = $request->correo_verificado; */
        $user->password = $request->contraseña;
        $user->save();


    }

}
