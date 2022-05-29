<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\User;
use App\Models\Comments_task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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
    public function index(Request $request)
    {   
        $tareas = Tarea::get();
        $tareasHoy=Tarea::whereDate('date_finally', '=', Carbon::now()->format('Y-m-d'))->get();

        if($request->buscar_tarea){  
            $tarea = Tarea::where("name", "LIKE", "%{$request->buscar_tarea}%")->get();
            
            return redirect()->route('home', ['tarea']);       
        }
    
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
        $comentarios = Comments_task::all();
        $tareasHoy=Tarea::whereDate('date_finally', '=', Carbon::now()->format('Y-m-d'))->get();
        return view('verTarea', compact('tarea','tareasHoy','comentarios'));
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
        if($request->finalizacion == ""){
            $fecha = DB::table('tasks')->select('date_finally')->first();
            $tarea->date_finally = $fecha->date_finally;
        }else{
            $tarea->date_finally = $request->finalizacion.' 23:59:59';
        }
        $tarea->date_update = Carbon::now();
        $tarea->save();

        return redirect()->back();
        
    }

    public function addComment(Request $request){
        $comentario = new Comments_task;

        $comentario->id_task = $request->id_tarea;
        $comentario->name = $request->nombre_comentario;
        $comentario->description = $request->desc_comentario;
        $comentario->date_create = $request->date_create = Carbon::now();

        $comentario->save();
        return redirect()->route('verTarea', ['id' => $request->id_tarea]); 

    }

       
    // public function send(Request $request)
    // {
    //     $user = User::first();
  
    //     $tareas = [
    //         'greeting' => 'Hi Artisan',
    //         'body' => 'This is my first notification from HackTheStuff',
    //         'thanks' => 'Thank you for using HackTheStuff article!',
    //         'actionText' => 'View My Site',
    //         'order_id' => 'Order-20190000151'
    //     ];
  

    //     // $date = now()->addDays(2);
    //     // $users = User::all();
    //     // Tarea::where('date_finally', '<', $date)->get()->each(function($tareas) use ($users) {
    //         Notification::send('antonioquesada00@gmail.com', new MailParametrizado($tareas));
    //     // });

    // } 


}
