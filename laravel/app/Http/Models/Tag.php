<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];


    // relacion polimorfica muchos a muchos
    // $tag-posts
    public function posts():MorphToMany
    {
        return $this->morphByMany(Post::class,'taggable');
    }

    // relacion polimorfica muchos a muchos
    // $tag-videos
    public function videos():MorphToMany
    {
        return $this->morphByMany(Video::class,'taggable');
    }

}
