<?php
/**
 * Controla el acceso de los usuarios a las preguntas,
 * vea la politica ReplyPolicy para detalles.
 *
 * La politicas se pueden agregar al constructor del controlador
 * public function __construct() { $this->middleware([ 'can:update,thread' ]); }
 *
 */

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;

class ThreadPolicy
{

    public function update(User $user, Thread $thread)
    {
        return $user->id === $thread->user_id; // true, false
    }

}
