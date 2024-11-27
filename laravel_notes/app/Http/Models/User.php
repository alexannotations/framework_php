<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function phone():HasOne
    {
        return $this->hasOne(Phone::class,'user_id','id');
    }

    public function phones():HasMany
    {
        return $this->hasMany(Phone::class);
    }

    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withPivot('added_by');
    }

    // relación de paso
    public function phoneSim():HasOneThrough
    {
        // Usuario tiene una relacion con Sim::class el destino final, a traves del Phone::class 
        return $this->hasOneThrough(Sim::class,Phone::class);
    }

    // relación de paso a traves de muchos
    public function phoneSims():HasManyThrough
    {
        // Usuario tiene relacion con Sim::class el destino final, a traves del Phone::class 
        return $this->hasManyThrough(Sim::class,Phone::class);
    }


    // Relacion polimorfica a uno
    public function image():MorphOne
    {
        // se respeto la convencion de nombre, por lo que no se agregan los demas parametros
        return $this->morphOne(Image::class, 'imageable');
    }

    // Relacion polimorfica a muchos, retorna multiples valores
    public function images():MorphMany
    {
        // se respeto la convencion de nombre, por lo que no se agregan los demas parametros
        return $this->morphMany(Image::class, 'imageable');
    }

}
