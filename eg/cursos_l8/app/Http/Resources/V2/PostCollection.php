<?php
/**
 * Cuando trabajamos con colecciones, es fundamental que el formato de la respuesta coincida con el de un recurso individual.
 * Para ello, se configuran propiedades dentro de la clase de recursos, utilizando PostResource::class. 
 * Esto asegura que todos los datos, desde el id hasta la fecha de creación, se muestren correctamente 
 * y de manera uniforme en toda la colección.
 * 
 * */

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    public $collects = PostResource::class; // para indicar que recurso usar en la coleccion (aunque ya no es necesario usar *Resource::collection en toArray en esta version de laravel)

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            // 'data_resource_collection' => PostResource::collection($this->collection),
            'data' => $this->collection,
            'meta' => [
                'draft_project' => 'cursos laravel8',
                'type' => 'posts',
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage()
            ],
            'links' => [
                'first' => $this->url(1),
                'last' => $this->url($this->lastPage()),
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
            ],
        ];
    }

}
