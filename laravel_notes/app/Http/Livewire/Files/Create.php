<?php

namespace App\Http\Livewire\Files;

use Livewire\Component;
use Livewire\WithFileUploads;   // trait para manejar archivos
use App\Models\File;

class Create extends Component
{
    use WithFileUploads;

    // array para multiple
    public $files = [];

    protected $rules = [
        // el .* es para el multiple, quitar si es uno solo
        'files.*' => [
            'required',
            'mimes:pdf,png,jpg,jpeg',
        ],
    ];

    public function save()
    {
        $this->validate();

        foreach ($this->files as $key => $file) {
            $file_save = new File();
            // $file_save->file_name = $this->file->getClientOriginalName();   // nombre del archivo, sin multiple
            $file_save->file_name = $file->getClientOriginalName();   // nombre del archivo
            $file_save->file_extension = $file->extension();
            $file_save->file_path = 'storage/' . $file->store('files', 'public');
            $file_save->save();
        }

        return redirect()->route('files.index');
    }

    public function render()
    {
        return view('livewire.files.create')
            ->extends('layouts.app')
            ->section('content');
    }
}
