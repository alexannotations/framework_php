<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActionComponent extends Component
{
    public $counter = 0;

    public function add($counterParameter){
        return $this->counter += $counterParameter;
    }

    public function setZero(){
        return $this->counter = 0;
    }

    public function store()
    {
        return $this->counter = 20;
    }
    
    public function render()
    {
        return view('livewire.action-component');
    }
}
