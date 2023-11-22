<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

use Spatie\Permission\Models\Permission;

class roleController extends Controller
{

    public function __construct() {
        $this->middleware('can:role.index')->only('index');
        $this->middleware('can:role.show')->only('show');
        $this->middleware('can:role.create')->only('create','store');
        $this->middleware('can:role.edit')->only('edit','update');
        $this->middleware('can:role.destroy')->only('destroy');
    }

    public function index()
    {
        $role = Role::orderBy('id')->paginate(5);
        return view('role.index',compact('role'));
    }

    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('role.show',compact('role','permissions'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('role.edit',compact('role','permissions'));
    }



    public function update(Request $request,Role $role)
    {
        $request -> validate([
            'name' => 'required'
        ]);

        $role ->update($request->all());

        //$role->permissions()->sync($request->get('permission'));
        //$role->permissions()->sync($request->permission);
        $role->syncPermissions($request->permissions);

        return redirect()->route('role.show',$role)->with('info','El Rol se actualizó con éxito.');
    }



    public function create()
    {
        $permissions = Permission::all();
        return view('role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required'
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        // $role->permissions()->sync($request->get('permission'));
        $role->permissions()->sync($request->permissions);
        return redirect()->route('role.show',$role)->with('info','El Rol se creó con éxito.');
    }

    public function destroy(Role $role) 
    {
        $usuariosConRol = User::role($role->name)->get('name');
        if (count($usuariosConRol) === 0){
            // $usuariosConRol = '--NUL--';
            $role->delete();
            return redirect()->route('role.index')->with('info', 'El Rol se eliminó con éxito.');
        }else{
            return redirect()->route('role.index')->with('info', 'El Rol NO se eliminó, tiene usuarios asigandos.');
        }

    }
}
