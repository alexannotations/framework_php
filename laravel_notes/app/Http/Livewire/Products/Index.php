<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // Los estilos vienen precargados para tailwild, para usar bootstrap
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::paginate(3),
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
