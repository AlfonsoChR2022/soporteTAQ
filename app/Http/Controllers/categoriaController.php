<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\categorias;
use App\Models\tickets;

class categoriaController extends Controller
{

    public function __construct() {
        $this->middleware('can:categoria.index')->only('index');
        $this->middleware('can:categoria.show')->only('show');
        $this->middleware('can:categoria.create')->only('create','store');
        $this->middleware('can:categoria.edit')->only('edit','update');
        $this->middleware('can:categoria.destroy')->only('destroy');
    }

    public function index(){
        $cates = categorias::orderBy('id')->paginate(5);
        return view('categoria.index',compact('cates'));
    }

    public function create(){
        return view('categoria.create');
    }

    public function store(Request $request){
        $request -> validate([
            'categoria' => 'required',
        ]);

        $categoria = new categorias();
        $categoria -> categoria = $request->categoria;

        $categoria -> save();
        return redirect()->route('categoria.show',$categoria->id)->with('info','La Categoría se creó con éxito.');
    }


    public function show(categorias $categorium){
        return view('categoria.show',compact('categorium'));
    }

    public function edit(categorias $categorium){
        return view('categoria.edit',compact('categorium'));
    }


    public function update(Request $request, categorias $categorium){
        $request -> validate([
            'categoria' => 'required',
        ]);

        $categorium -> categoria = $request -> categoria;
        $categorium -> save();
        return redirect()->route('categoria.show',$categorium)->with('info','La Categoría se actualizó con éxito.');
    }

    public function destroy(categorias $categorium){
         $enlace = tickets::where('id_categoria',$categorium->id, '<>', '')->get();
        if (count($enlace) === 0){
            $categorium -> delete();
            return redirect()->route('categoria.index')->with('info', 'La categoría se eliminó con éxito.');
        }
        return redirect()->route('categoria.index')->with('info', 'La categoría NO se eliminó, se encuentra asignada en tickets.');
    }

}
