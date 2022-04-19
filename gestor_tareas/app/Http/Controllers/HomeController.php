<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Carbon\Carbon;

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
        $tareas = Tarea::all();
        return view('home')->with(compact('tareas'));
    }


    public function crearTarea(Request $request){
        $tarea = new Tarea;

        $tarea->id_user = $request->id;
        $tarea->name = $request->nombre;
        if($request->descripcion == ""){
            $tarea->description = "";
        }else{
            $tarea->description = $request->descripcion;
        }
        $tarea->date_finally = $request->finalizacion;
        $tarea->date_create = Carbon::now();

        $tarea->save();
        return redirect()->route('home');

    }




}
