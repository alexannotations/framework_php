<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'body', 'iframe', 'image', 'user_id'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }


    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // extracto del body
    public function getGetExcerptAttribute($key)
    {
        return substr($this->body, 0, 140);
    }

    public function getGetImageAttribute()
    {
        if ($this->image) {
            return url("storage/{$this->image}");
        }
    }

    /**
     * Retorna el nombre de la columna que se usara buscar el modelo en la BD para la ruta
     * y no al valor de la propiedad slug del modelo $this->slug
     * 
     * En Laravel 6, el método getRouteKeyName debe retornar el nombre de la columna 
     * que se desea usar como clave para el model binding. Normalmente usa el id.
     * Esto permite URLs más amigables y legibles, funcionales para SEO:
     * 
     * Si tienes un registro en la base de datos con el siguiente slug:
     *      slug: "my-first-post"
     * Puedes acceder al recurso con una URL como esta:
     *      http://your-app.test/posts/my-first-post
     * Laravel buscará automáticamente el modelo Post donde slug = 'my-first-post'.
     * 
     */
    public function getRouteKeyName()
    {
     return 'slug';
    }

}
