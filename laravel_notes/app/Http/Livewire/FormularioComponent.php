<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormularioComponent extends Component
{
    public $message = 'Hola mundo';

    public $mostrar = false;

    public $state;

    // esta accion se sustituye con Magic actions
    // public function changeMessage($value)
    // {
    //     return $this->message = $value;
    // }

    // Change
    public function changeState($value)
    {
        $this->state = $value;
    }

    public function render()
    {
        return view('livewire.formulario-component');
    }
}
