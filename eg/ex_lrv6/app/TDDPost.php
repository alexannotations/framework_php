<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TDDPost extends Model
{
    protected $table = 't_d_d_posts';

    protected $fillable = [
        'title',
        'content',
    ];

}
