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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getExceprtAttribute()
    {
        return substr($this->description, 0, 80). "...";
    }

    public function getAvatarAttribute()
    {
        $path = $this->profile_photo_path;
        // gravatar
        $email = md($this->email);
        if($this->profile_photo_path){
            return asset("storage/$path");  // FIXME: 
        }else{
            return "https://s.gravatar.com/avatar/{$email}";
        }
    }

    public function similar()
    {
        return $this->where('category_id', $this->category_id)
        ->with('user')
        ->take(2)
        ->get();
    }

}
