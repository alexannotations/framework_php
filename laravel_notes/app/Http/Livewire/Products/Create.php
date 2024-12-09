<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name;
    public $price;
    public $quantity;
    public $file;

    public $statuses;

    protected $rules = [
        'name' => ['required',],
        'price' => ['required', 'numeric',],
        'quantity' => ['required', 'integer',],
        'file' => ['required', 'file', 'mimes:pdf,png,jpg,jpeg',],
    ];

    protected $messages = [
        'name.required' => 'El producto es obligatorio',
        'price.required' => 'Debemos ingresar una mayor o igual a cero',
        'quantity.required' => 'La cantidad debe ser un numero entero',
        'file.required' => 'El archivo es requerido',
    ];

    public function save()
    {
        $validated_data = $this->validate();

        // Subir archivo y obtener su ruta
        if ($this->file) {
            $file_path = 'storage/' . $this->file->store('products', 'public');
            $validated_data['file_name'] = $this->file->getClientOriginalName();
            $validated_data['file_path'] = $file_path;
        }

        // Product::create([
        //     'name' => $this->name,
        //     'price' => $this->price,
        //     'quantity' => $this->quantity,
        // ]);
        Product::create($validated_data);
        $this->reset(); // limpia el formulario
        return redirect()->route('products.index')->with('success', 'Producto guardado exitosamente');
    }

    public function render()
    {
        return view('livewire.products.create')
            ->extends('layouts.app')
            ->section('content');
    }

    public function mount()
    {
        $this->statuses = [
            'nuevo' => 1,
            'resurtido' => 2,
            'descontinuado' => 3,
        ];
    }

    // validacion en tiempo real, lo inhabilita wire:model.defer
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
