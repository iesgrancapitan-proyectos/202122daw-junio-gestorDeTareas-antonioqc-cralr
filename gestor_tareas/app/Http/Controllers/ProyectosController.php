<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Proyecto;
use App\Models\ProyectoUser;
use Carbon\Carbon;

class ProyectosController extends Controller
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
    public function index(Request $request)
    {   
        $tareas = Tarea::get();
        $tareasHoy=Tarea::whereDate('date_finally', '=', Carbon::now()->format('Y-m-d'))->get();


        $proyectos = Proyecto::get();
        $proyectosuser = ProyectoUser::get();
        
        return view('proyectos')->with(compact('tareas','tareasHoy','proyectos','proyectosuser'));
    }


    public function crearProyecto(Request $request){
        $proyecto = new Proyecto;
        

        $proyecto->name = $request->nombre;
        if($request->descripcion == ""){
            $proyecto->description = "";
        }else{
            $proyecto->description = $request->descripcion;
        }
        $proyecto->date_finally = $request->finalizacion;
        $proyecto->date_create = Carbon::now();

        $proyecto->save();
        $proyecto->user()->attach($request->id);

        return redirect()->back();
    }

    public function eliminarProyecto($id)
    {


        $proyecto = proyecto::find($id);
        $proyecto->delete();
        

        return redirect()->route('proyectos');
    }

}
