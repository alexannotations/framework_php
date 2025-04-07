<?php
/** El modelo se nombra en singular
 * Un archivo representa a la tabla
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * Relationship with User model
     * One Post belongs to one user
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
