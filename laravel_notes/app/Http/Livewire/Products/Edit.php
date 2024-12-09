<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    public Product $product;
    public $product_photo;
    public $statuses;

    protected $rules = [
        'product.name' => 'required|string|max:255',
        'product.price' => 'required|numeric|min:0',
        'product.quantity' => 'required|integer|min:0',
        // 'product.file_name' => 'sometimes|file|mimes:pdf,png,jpg,jpeg|max:1024',
        // 'product.file_path' => 'sometimes',
        // 'product_photo' => 'sometimes',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->statuses = [
            'nuevo' => 1,
            'resurtido' => 2,
            'descontinuado' => 3,
        ];
    }

    public function render()
    {
        return view('livewire.products.edit')
            ->extends('layouts.app')
            ->section('content');
    }

    public function submit()
    {
        $data = $this->validate();

        // $product_photo = $this->product_photo ? $this->product_photo->store('products', 'public') : null;
        // $this->product->update([
        //     'file_path' => $product_photo,
        //     'file_name' => $this->product_photo->getClientOriginalName(),
        // ] + $data);

        $this->product->update($data);

        return redirect()->route('products.index')->with('success', 'Producto editado correctamente');
    }
}
