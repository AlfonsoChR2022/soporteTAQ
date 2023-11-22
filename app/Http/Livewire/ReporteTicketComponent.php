<?php

namespace App\Http\Livewire;
use App\Models\tickets;
use App\Models\categorias;

use Illuminate\Http\Request;
use Livewire\Component;


// use Livewire\WithPagination;


class ReporteTicketComponent extends Component
{
    /* use WithPagination;
    protected $paginationTheme = 'bootstrap'; */

    public $search;
    public $sort = 'id';
    public $direction = 'desc';


    /* public function updateSearch(){
        $this->reset($this->search);
        $this->goToPage(1);
    } */

    public function render(){
        $tkts = tickets::where('evento', 'like','%'  . $this->search . '%')
                ->Where('status','3')   
                ->orderBy($this->sort, $this->direction)->get();
                // ->paginate(5);
                // ->setPath(route('reportes.index'));

        $t_evto = categorias::all();
        return view('livewire.reporte-ticket-component',compact('tkts','t_evto'));
    }

    public function order($sort){
        // $this->sort = $sort;
        if($this->sort == $sort){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }

        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
    

}
