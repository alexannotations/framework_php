<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Phone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user():BelongsTo
    {
        return $this->BelongsTo(Phone::class);
    }

    // solo tiene una sim
    public function sim(): HasOne
    {
        return $this->hasOne(Sim::class);
    }

    // puede tener varias sims
    public function sims(): HasMany
    {
        return $this->hasMany(Sim::class);
    }

}
