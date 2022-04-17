<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function crearTarea(Request $request){
        $tarea = new Tarea;

        $tarea->name = $request->nombre;
        $tarea->description = $request->descripcion;
        $tarea->date_finally = $request->finalizacion;

        $tarea->save();
        return redirect()->route('home');

    }




}
