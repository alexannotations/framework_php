<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class AnidadoParentComponent extends Component
{
    public $name = 'Father component';

    // collection
    public $employees;
    
    public function render()
    {
        return view('livewire.anidado-parent-component');
    }

    public function mount()
    {
        $this->employees = 
            Employee::all();
        // [
        //     [
        //         'id'=>1,
        //         'name'=>'nombre1',
        //         'last'=>'apellido1',
        //     ],
        //     [
        //         'id'=>2,
        //         'name'=>'nombre2',
        //         'last'=>'apellido2',
        //     ]
        // ];
        
    }
}
