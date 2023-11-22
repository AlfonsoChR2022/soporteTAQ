<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\tickets;
use Spatie\Permission\Models\Role;



class usuarioController extends Controller
{

    public function __construct() {
        $this->middleware('can:usuario.index')->only('index');
        $this->middleware('can:usuario.show')->only('show');
        $this->middleware('can:usuario.create')->only('create','store');
        $this->middleware('can:usuario.edit')->only('edit','update');
        $this->middleware('can:usuario.destroy')->only('destroy');
    }

    public function index(){
        $usr = User::orderByDesc('id')->paginate(5);
        return view('usuario.index',compact('usr'));
    }

    public function create(){
        $role = Role::all();
        return view('usuario.create',compact('role'));
    }

    public function store(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $usuario = new user();
        $usuario -> name = $request -> name;
        $usuario -> email = $request -> email;
        $usuario -> password = bcrypt($request -> password);
        $usuario -> save();

        $usuario -> roles()->sync($request->role);


        return redirect()->route('usuario.show',$usuario->id)->with('info','El usuario se creó con éxito.');
    }

    public function show(user $usuario){
        $roles = Role::all();
        return view('usuario.show',compact('usuario','roles'));
    }

    public function edit(user $usuario){
        $roles = Role::all();
        return view('usuario.edit',compact('usuario','roles'));
    }

    public function update(Request $request, user $usuario){
        if (isset($_POST['btn-datos'])) {
            $request -> validate([
                'name' => 'required',
                'email' => 'required',
            ]);

            $usuario -> name = $request -> name;
            $usuario -> email = $request -> email;
            // $usuario -> password = bcrypt($request -> password);

            $usuario -> save();
            return redirect()->route('usuario.show',$usuario)->with('info','Se actualizaron datos del usuario correctamente.');
        }

        if (isset($_POST['btn-roles'])) {
            $usuario -> roles()->sync($request->roles);
            return redirect()->route('usuario.show',$usuario)->with('info','Se asigno los roles correctamente.');
        }
    }

    public function destroy(user $usuario)
    {
        $usuariosConTicket_Prop = tickets::where('user',$usuario->id)->get();
        $usuariosConTicket_Atie = tickets::where('atiende',$usuario->id)->get();

        if (count($usuariosConTicket_Prop) === 0 && count($usuariosConTicket_Atie) === 0 ){
            $usuario->delete();
            return redirect()->route('usuario.index')->with('info', 'El Usuario se eliminó con éxito.');
        }else{
            return redirect()->route('usuario.index')->with('info', 'El Usuario NO se eliminó, tiene tickets comprometidos.');
        }

    }

}
