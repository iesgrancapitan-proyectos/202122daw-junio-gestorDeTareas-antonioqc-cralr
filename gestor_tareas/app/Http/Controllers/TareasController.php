<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Carbon\Carbon;

class TareasController extends Controller
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
        $tareas = Tarea::get();
        $tareasHoy=Tarea::whereDate('date_finally', '=', Carbon::now()->format('Y-m-d'))->get();
    
        return view('home')->with(compact('tareas','tareasHoy'));
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
        $tarea->date_finally = $request->finalizacion.' 23:59:59';
        $tarea->date_create = Carbon::now();

        $tarea->save();
        return redirect()->route('home');
    }

    public function eliminarTarea($id)
    {
        $tarea = Tarea::find($id);

        $tarea->delete();

        return redirect()->route('home');
    }


    public function getTareasHoy(){
        $tareasHoy=Tarea::whereDate('date_finally', '=', Carbon::now()->format('Y-m-d'))->get();
        
        return view('home')->with(compact('tareasHoy'));


    }

    public function verTarea($id)
    {   
        $tarea= Tarea::find($id);
        $tareasHoy=Tarea::whereDate('date_finally', '=', Carbon::now()->format('Y-m-d'))->get();
        return view('verTarea', compact('tarea','tareasHoy'));
    }

    public function editarTarea(Request $request,$id)
    {   
        $tarea = Tarea::find($id);
        $tarea->id_user = $request->id;
        $tarea->name = $request->nombre;
        if($request->descripcion == ""){
            $tarea->description = "";
        }else{
            $tarea->description = $request->descripcion;
        }
        $tarea->date_update = Carbon::now();
        $tarea->save();

        return redirect()->back();
        
    }


}
