<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class AnidadoChildComponent extends Component
{
    public $message;    // recibido desde el componente padre
    public $employee;

    public function render()
    {
        return view('livewire.anidado-child-component');
    }

    // el parametro seenvia desde el componente padre
    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }
}
