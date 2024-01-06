<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
¿Por qué el método en Post debe llamarse user() obligatoriamente?
Si intentan cambiar el nombre del método dentro del modelo Post verán que todo se rompe. Esto es porque el método depende de la clave foránea creada (de la clave foránea, no del nombre del otro modelo). Nosotros la llamamos user_id, entonces interpreta que el atributo que le va a “dar vida” se va a llamar user. Si se llamase userx_id el método debería llamarse userx() y entonces el atributo a usar en la vista sería userx.
Aparentemente, para que Laravel reconozca esto la clave foránea debe terminar en _id, entonces el nombre correspondiente sería lo que está antes del guion bajo.
Más arriba dije que depende de la clave foránea y no del modelo porque tranquilamente mi clave foránea podría ser userx_id y el modelo al que hace referencia podría haber sido User y esto no importa porque esta relación ya se indica en las migraciones. Entonces en un post podríamos tener un autor y un asistente, corresponden a un User y podríamos llamar a sus claves foráneas author_id y assistant_id sin importar que el modelo se llame User.
Ahora algunos ejemplos por si no quedó claro:

Si la clave foránea es user_id el método debe llamarse user() y el atributo se llamará user.
Si la clave foránea es author_id el método debe llamarse author() y el atributo se llamará author.
Si la clave foránea es usuario_id el método debe llamarse usuario() y el atributo se llamará usuario.
*/

class Post extends Model
{
    #protected $table = 'post' ;
    use HasFactory;

    # no se puede utilizar la asignacion masiva de datos sin antes configurarla
    # Add [title] to fillable property to allow mass assignment on [App\Models\Post].
    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    /* Attempt to read property "name" on null
    Se debe especificar a laravel que existe una relacion entre
    las tablas users - posts
    Una publicacion pertenece a un unico usuario
    se escribe en singular de manera intencional
    */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Se pueden agregar atributos virtuales al modelo que no se encuentran en la base de datos
     * este campo virtual se llama desde la vista, y cuample las relaciones de eloquent
     *  $post->gravatar
     * 
     */
        public function getGravatarAttribute(){
            // gravatar de wordpress
            $email = md5($this->email);
            return "https://s.gravatar.com/avatar/$email";
        }

}
