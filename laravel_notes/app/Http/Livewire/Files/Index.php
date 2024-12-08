<?php

/**
 * ejecutar para que muestre el asset por medio del path
 *      php artisan storage:link
 * esto crea un link de acceso publico
 * 
 * Para deshabilitar los motores de busqueda
 * Disallow: /storage/
 * 
 */

namespace App\Http\Livewire\Files;

use Livewire\Component;
use App\Models\File;

class Index extends Component
{
    public function render()
    {
        return view('livewire.files.index', [
            'files' => File::all(),
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
