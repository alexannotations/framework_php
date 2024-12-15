<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   // Polica de autorización
use App\Models\Reply;
use Livewire\Component;

class ShowReply extends Component
{
    use AuthorizesRequests;

    // se pasa como el segundo parametro en el componente blade,
    // desde la vista se espera una Reply
    public Reply $reply;

    public $body = '';
    public $is_creating = false;    // usa toggle
    public $is_editing = false;     // usa toggle

    protected $listeners = ['refreshComponente' => '$refresh'];   // registramos una funcion de refrescar (evento)


    // Vease metodo de salvar de Thread (pregunta)
    public function postChild()
    {
        // Evita que se creen respuestas a las respuestas anidadas (solo 2 niveles de respuesta)
        if ( ! is_null($this->reply->reply_id)) return;

        // validate
        $this->validate(['body' => 'required']);
        // create
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,    // incluye a la respuesta padre por la relacion
            'body' => $this->body
        ]);
        // refresh
        $this->is_creating = false;
        $this->body = '';
        $this->emitSelf('refreshComponente'); // le indica al componente que se refresque (emite el evento que tiene en el mismo componente)
    }

    // livewire utiliza el metodo updated<nombre de la variable> para captar el cambio de valor de la propiedad en el formulario
    // cuando se este actualizando aparezca el texto de la respuesta
    public function updatedIsCreating()
    {
        $this->is_editing = false;  // el valor se invierte, dado que se hace solo una accion (crear/editar)
        $this->body = '';
    }

    // livewire utiliza el metodo updated<nombre de la variable>()
    // Se puede recibir parametro, pero el proyeto no lo requiere, eg. $is_editing
    public function updatedIsEditing($is_editing)
    {
        // dd($is_editing);

        // evalua si esta autorizado, update es el nombre del metodo que actualiza a la entidad respuesta
        $this->authorize('update', $this->reply);

        $this->is_creating = false; // cancela, para no mostrar el formulario (editar/crear)
        $this->body = $this->reply->body;
    }


    public function updateReply()
    {
        // control de acceso, error 403
        $this->authorize('update', $this->reply);
        // validate
        $this->validate(['body' => 'required']);
        // update, solo requiere actualizar el body
        $this->reply->update(['body' => $this->body]);
        // refresh
        $this->is_editing = false;
    }

    public function render()
    {
        return view('livewire.show-reply');
    }

}
