<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\tickets;
use App\Models\categorias;
use App\Models\datempre;
use App\Models\User;



class reportesController extends Controller
{
 

    public function __construct() {
        $this->middleware('can:reportes.index')->only('index');
        $this->middleware('can:reportes.show')->only('show');
    }

    public function index(){
        return view('reportes.index');
    }

    public function show(Request $request){
        $id_tkt = $request->reporte;
        /*$ticket = tickets::Where('id',$id_tkt)->get();
        return view('reportes.show',compact('ticket')); */
        
        $ticket = tickets::Where('id',$id_tkt)->first();
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
        return view('reportes.show',compact('ticket','categoria','user','atiende','terminal'));
        
    }


}
