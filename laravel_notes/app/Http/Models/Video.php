<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    // relacion polimorfica muchos a muchos
    public function tags() : MorphToMany
    {
        // (class, tabla de paso)
        return $this->morphToMany( Tag::class,'taggable');
    }

}
