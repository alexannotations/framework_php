<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class LifecycleHookComponent extends Component
{
    public $count = 1;
    public $message;
    public $saludo_frances;
    public $categories; // se inicializa la primera vez, en mount

    // updating
    public function increment()
    {
        $this->count++;
    }


    // en el ciclo de vida del componente mount() se ejecuta antes de render()
    // solo se ejecuta una vez despues de instanciar el componente
    public function mount()
    {
        $this->message = 'Hello';
        $this->categories = Category::all();    // se puede traer las categorias para un menu
    }

    public function render()
    {
        return view('livewire.lifecycle-hook-component');
    }

    // se ejecuta el updated a la propiedad
    // observe la relacion del nombre de la propiedad y del metodo anteponiendo updated
    // message -> updatedMessage
    // saludo_frances -> updatedSaludo
    public function updatedMessage()
    {
        $this->message = strtoupper($this->message);
    }
    // un ejemplo practico donde una lista desplegable depende de otra lista desplegable
    // por ejemplo una marca de autos obtiene los modelos de dicha marca
    public function updatedSaludoFrances()
    {
        $this->saludo_frances = 'Salut!';
    }
}
