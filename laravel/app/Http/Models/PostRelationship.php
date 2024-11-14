<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relacion polimorfica (a uno)
    public function image():MorphOne
    {
        // el nombre imageable para el id y el type
        return $this->morphOne(Image::class, 'imageable','imageable_type','imageable_id');
    }

    // Relacion polimorfica (a muchos)
    public function images():MorphMany
    {
        // el nombre imageable para el id y el type
        return $this->morphMany(Image::class, 'imageable','imageable_type','imageable_id');
    }

    // relacion polimorfica muchos a muchos
    public function tags() : MorphToMany
    {
        // (class, tabla de paso)
        return $this->morphToMany( Tag::class,'taggable');
    }

}
