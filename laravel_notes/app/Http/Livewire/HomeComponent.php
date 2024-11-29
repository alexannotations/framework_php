<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    public $message = "Test public property. Hay palabras reservadas que no pueden usarse.";
    public $funciona = true;
    public $lazymessage = "lazy message";
    public $debouncemessage = "debounce message 2 segundos";
    public $defermessage = "defer message";

    public function render()
    {
        return view('livewire.home-component');
    }
}
