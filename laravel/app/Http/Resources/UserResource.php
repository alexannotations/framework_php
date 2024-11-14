<?php
/**
 * php artisan make:resource UserResource
 */

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,

            'roles' => $this->roles,

            'phone' => $this->phone,
            'phones' => $this->phones,
            'phone_c' => '('.$this->phone->prefix.')'.$this->phone->phone_number,

            // polimorfica
            'image' => $this->image,
        ];    
    }
}
