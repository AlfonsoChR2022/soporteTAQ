<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tickets;

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
        $concentrado = tickets::select('status')
                        ->selectRaw('count(*) as score')
                        ->groupBy('status')
                        ->get();
        return view('home',compact('concentrado'));
    }
}
