<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index(){

        return view('hometareas.home');
    }
}
