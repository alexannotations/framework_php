<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_id',
        'thread_id',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Respuestas anidadas
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    // Pregunta
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

}
