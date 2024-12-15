<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Thread;

class ShowThread extends Component
{
    // Se tipa con el Modelo el atributo para que sea la busqueda sea implicita
    public Thread $thread;  // representa a la entidad que representa a la pregunta

    public $body = '';

    // Tiene el codigo para la creacion de la respuesta
    public function postReply()
    {
        // validar
        $this->validate(['body' => 'required']);
        // al usuario autenticado se le crear la respuesta a la pregunta
        // indicando la relacion, lod valores provienen de los atributos publicos
        auth()->user()->replies()->create([
            'thread_id' => $this->thread->id,
            'body' => $this->body,
        ]);
        // Para actualizar eliminamos el valor de la propiedad
        $this->body = '';
    }

    public function render()
    {
        // enviamos las respuestas a la pregunta
        return view('livewire.show-thread', [
            // envia todas las respuestas que pertenezcan a esta pregunta, whereNull() muestra las anidadas sin que el contenido hijo no se repita
            'replies' => $this->thread
                ->replies()
                ->whereNull('reply_id') // Condición utilizada para listar solo las respuestas padres
                ->with('user', 'replies.user', 'replies.replies')   // ayuda al rendimiento al hacer menos queries (mantiene 9 consultas)
                ->get()
        ]);
    }
}
