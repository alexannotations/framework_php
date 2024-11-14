<?php
/**
 * Role user requiere una tabla de paso, para asociar los roles con los usuarios
 * 
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    protected $guarded =[];

    // pertenece a muchos
    public function users() :BelongsToMany
    {
        // si la tabla tiene informacion extra
        // podemos traerla con pivot
        return $this->belongsToMany(
            User::class,'role_user',
            'user_id',
            'role_id')
            ->withPivot('added_by');
    }


}
