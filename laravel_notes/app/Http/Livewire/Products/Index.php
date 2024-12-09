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

    protected $listeners = ['delete'];


    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::paginate(5),
        ])
            ->extends('layouts.app')
            ->section('content');
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
    }
}
