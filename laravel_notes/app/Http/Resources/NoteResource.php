<?php

/**
 * \app\Http\Resources\NoteResource.php
 * php artisan make:resource NoteResource
 * 
 * Los resources apoyan la serializacion
 * 
 */

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => 'Title: ' . $this->title,
            'content' => $this->content,
            'without' => 'This is an example without persistence',
        ];
        // // devuelve el array del modelo
        // return parent::toArray($request);
    }
}
