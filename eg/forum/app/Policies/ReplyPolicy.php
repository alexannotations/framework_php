<?php
/**
 * Las politicas se consideran como restricciones que se asignan respecto a los usuarios
 */

namespace App\Policies;

use App\Models\User;    // todas las politicas, siempre estan relacionadas con los usuarios
use App\Models\Reply;   // estas se asignan respecto a otra entidad, en este caso Reply

class ReplyPolicy
{

    /**
     * Solo se pueden editar sus respuestas
     * Controlando el acceso a sus respuestas
     * los parametros siempre son usuario y la entidad que deseamos afectar
     *  */
    public function update(User $user, Reply $reply)
    {
        // el id del usuario es igual al id de creacion de la respuesta
        // permite aislar el if can()
        return $user->id === $reply->user_id;   // true || false
    }


}
