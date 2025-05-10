<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExceprtAttribute()
    {
        return substr($this->description, 0, 80). "...";
    }

    public function getAvatarAttribute()
    {
        // gravatar
        $email = md($this->email);
        return "https//s.gravatar.com/avatar/$email";
    }

}
