<?php

namespace App\Http\Controllers;
use App\Models\tickets;
use App\Models\categorias;
use App\Models\User;
use App\Models\datempre;

use Illuminate\Http\Request;

class ticketController extends Controller
{
    public function __construct() {
        $this->middleware('can:ticket.index')->only('index');
        $this->middleware('can:ticket.show')->only('show');
        $this->middleware('can:ticket.create')->only('create','store');
        $this->middleware('can:ticket.edit')->only('edit','update');
        $this->middleware('can:ticket.destroy')->only('destroy');
    }



    public function index(){

        $tkts = tickets::orderByDesc('id')
                    ->paginate(5);
        $t_evto = categorias::all();
        $userX = user::all();
        return view('ticket.index',compact('tkts','t_evto','userX'));
    }

    public function create(){
        $categories = categorias::pluck('categoria','id');
        $terminal = datempre::first();
        $user = auth()->user();
        return view('ticket.create',compact('categories','terminal','user'));
    }

    public function store(Request $request){
        $request -> validate([
            'evento' => 'required',
            'descrip' => 'required',
        ]);

        $ticket = new tickets();
        // categorias::find($ticket->id_categoria)->categoria;

        $ticket -> terminal = datempre::first()->cla_empre;
        $ticket -> evento = $request -> evento;
        $ticket -> id_categoria = $request -> id_categoria;
        $ticket -> descrip = $request -> descrip;
        $ticket -> prioridad = $request -> prioridad;

        $ticket -> fecha_crea = now();
        $ticket -> status = 1;
        $ticket -> user = auth()->id();

        $ticket -> save();
        return redirect()->route('ticket.show',$ticket->id)->with('info','El ticket se creó con éxito.');
    }


    public function update(Request $request, tickets $ticket){
        if (isset($_POST['btn-update'])) {
            $request -> validate([
                'evento' => 'required',
                'descrip' => 'required',
            ]);
            
            // UPDATE 
            $ticket -> terminal = $request -> terminal;
            $ticket -> id_categoria = $request -> id_categoria;
            $ticket -> evento = $request -> evento;
            $ticket -> descrip = $request -> descrip;
            $ticket -> prioridad = $request -> prioridad;
            $ticket -> save();
            return redirect()->route('ticket.show',$ticket)->with('info','Se actualizaron datos del ticket correctamente.');
        }else{

            $ticket -> fecha_cierre= now();
            $ticket -> atiende = auth()->id();
            
            if (isset($_POST['btn-guarda'])) {
                // Guarda Solución
                $ticket -> status = 2;
                $ticket -> solucion = $request -> solucion;
            }
    
            if (isset($_POST['btn-finaliza'])) {
                // Finaliza Solución
                $ticket -> status = 3;
                $ticket -> solucion = $request -> solucion;
            }
    
            if (isset($_POST['btn-cancela'])) {
                $ticket -> status = 4;
            }

            $ticket -> save();
            return redirect()->route('ticket.show',$ticket->id)->with('info','Se Cambio el estatus del ticket correctamente.');
        }
    }


    public function show(tickets $ticket){
        $categoria = categorias::find($ticket->id_categoria)->categoria;
        $user = User::find($ticket->user);
        $user = $user->name;
        $atiende = User::find($ticket->atiende);
        if ($atiende == null){
            $atiende = '';
        }else{
            $atiende = $atiende->name;
        }
        $terminal = datempre::where('cla_empre',$ticket->terminal)->first();
        return view('ticket.show',compact('ticket','categoria','user','atiende','terminal'));
    }
    

    public function edit(tickets $ticket){
        $categories = categorias::pluck('categoria','id');
        $terminal = datempre::first();
        $user = auth()->user();
        return view('ticket.edit',compact('ticket','categories','terminal','user'));
    }

    public function destroy(tickets $ticket){
        $ticket -> delete();
        return redirect()->route('ticket.index')->with('info', 'El ticket se eliminó con éxito.');
    }




}
