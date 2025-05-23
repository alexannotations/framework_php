<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship with Post model
     * One user can have many posts
     *
     * @var array
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


// Accesor and Mutators

    public function getGetNameAttribute()
    {
        return strtoupper($this->name);
    }

    // guarda el nombe en minuscula
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
