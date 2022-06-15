<?php

namespace App\Http\Controllers;

use App\Models\Comments_project;
use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Proyecto;
use App\Models\ProyectoUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Notification;
use App\Notifications\MailParametrizado;

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
        $id=Auth::id();
        $tareas = Tarea::where('id_user',$id)->get();
        $tareasHoy=Tarea::where('id_user',$id)->whereDate('date_finally', '=', Carbon::now()->format('Y-m-d'))->get();
        $proyectos = User::find($id)->project;
        $proyectosuser = ProyectoUser::where('id_user',$id)->get();
        
        if($request->buscar_proyecto){
            foreach($proyectos as $proyecto){
                $busquedas = Proyecto::where("name", "LIKE", "%{$request->buscar_proyecto}%")->orderBy('date_finally','ASC')->get();
                return view('proyectos')->with(compact("busquedas",'tareasHoy','tareas','proyectos','proyectosuser'));
            }    
        }
     
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

    public function verProyecto($id)
    {   
        $proyecto= Proyecto::find($id);
        $comentarios = Comments_project::all();
        $tareasHoy=Tarea::whereDate('date_finally', '=', Carbon::now()->format('Y-m-d'))->get();
        return view('verProyecto', compact('proyecto','comentarios','tareasHoy'));
    }

    public function editarProyecto(Request $request,$id)
    {   
        $proyecto = Proyecto::find($id);
        $proyecto->name = $request->nombre;
        if($request->descripcion == ""){
            $proyecto->description = "";
        }else{
            $proyecto->description = $request->descripcion;
        }
        if($request->finalizacion == ""){
            $fecha = DB::table('projects')->where('id',$id)->select('date_finally')->first();
            $proyecto->date_finally = $fecha->date_finally;
        }else{
            $proyecto->date_finally = $request->finalizacion.' 23:59:59';
        }
        $proyecto->date_update = Carbon::now();
        $proyecto->save();

        return redirect()->back();
    }

    public function addCommentProject(Request $request){
        $comentario = new Comments_project();

        $comentario->id_project = $request->id_proyecto;
        $comentario->name = $request->nombre_comentario;
        $comentario->id_user = $request->id_user;
        $comentario->description = $request->desc_comentario;
        $comentario->date_create = $request->date_create = Carbon::now();

        $comentario->save();
        return redirect()->route('verProyecto', ['id' => $request->id_proyecto]); 

    }

    public function sendEmailInvitation(Request $request){

        $email = $request->email_input;
        $usuario = User::where('email',$email)->first();    
        
        $id_proyecto = $request->id_proyecto;

        $proyecto = Proyecto::where('id',$id_proyecto)->first(); 

        if($usuario == null){
            return redirect()->back()->with('messageError', '¡Debe seleccionar un usuario para realizar la invitación!');
        }

        $usuario_repetido = ProyectoUser::where('id_user',$usuario->id)->where('id_project',$id_proyecto)->first();

        /* return $usuario_repetido; */

        

        if($usuario_repetido == []){
            $details = [
                'greeting' => 'Buenas '. $usuario->name.' ,',
                 'body' => 'Ha sido invitado al proyecto '.$proyecto->name,
                 'thanks' => 'Gracias por usar WorkFine',
                 'actionText' => '',
                 'actionURL' => ''
            ];
            Notification::route('mail', $email)->notify(new MailParametrizado($details));

            $proyectouser = new ProyectoUser();
            $proyectouser->id_user = $usuario->id;
            $proyectouser->id_project = $id_proyecto;
            $proyectouser->save();
            return redirect()->back()->with('message', '¡Invitación enviada correctamente!');
        }
        else{
           
            return redirect()->back()->withErrors('Ya ha invitado al usuario '.$usuario->name.' a '.$proyecto->name);
        }       
    }
}
