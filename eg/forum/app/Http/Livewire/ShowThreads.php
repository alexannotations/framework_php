<?php

namespace App\Http\Livewire;

use \App\Models\Category;
use \App\Models\Thread;
use Livewire\Component;

class ShowThreads extends Component
{
    public $search = '';    // filtramos con el buscador los resultados de los titulares de los hilos
    public $category = '';  // filtrado mediante las categorias

    // Se usa una funcion porque se trabaja a traves de la vista con un clic para
    // asignar un valor a la propiedad publica y filtrar la categoria
    public function filterByCategory($category)
    {
        $this->category = $category;
    }


    public function render()
    {
        $categories = Category::get();

        // creamos una consulta
        $threads = Thread::query();

        // // Otro ejemplo de busqueda donde remplaza los espacios vacios por % para el query SQL
        // $strSearch = $this->search == '' ? false : ('%' . str_replace(' ', '%', $this->search) . '%');
        // //
        // $threads = Thread::when($strSearch, function ($query, $strSearch) {
        //                 return $query->where('title', 'like', $strSearch);
        //             })->withCount('replies')->latest();

        // empieza de manera cronologica, trae y cuenta las respuestas
        $threads->where('title', 'like', "%$this->search%");

        // filtra la categoria si se especifica en la lista
        if ($this->category) {
            $threads->where('category_id', $this->category);
        }

        $threads->with('user', 'category'); // ayuda al rendimiento al hacer menos queries
        $threads->withCount('replies')->latest();

        return view('livewire.show-threads',[
            'categories' => $categories,
            'threads' => $threads->get(),
        ]);
    }
}
