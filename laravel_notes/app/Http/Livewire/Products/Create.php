<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $price;
    public $quantity;

    protected $rules = [
        'name' => ['required',],
        'price' => ['required', 'numeric',],
        'quantity' => ['required', 'integer',],
    ];

    protected $messages = [
        'name.required' => 'El producto es obligatorio',
        'price.required' => 'Debemos ingresar una mayor o igual a cero',
        'quantity.required' => 'La cantidad debe ser un numero entero',
    ];

    public function save()
    {
        $validated_data = $this->validate();
        // Product::create([
        //     'name' => $this->name,
        //     'price' => $this->price,
        //     'quantity' => $this->quantity,
        // ]);
        Product::create($validated_data);
        return redirect()->route('products.index')->with('success', 'Producto guardado exitosamente');
    }

    public function render()
    {
        return view('livewire.products.create')->extends('layouts.app')->section('content');
    }

    // validacion en tiempo real
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
