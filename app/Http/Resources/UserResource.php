<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->resource != null){

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'surname' => $this->resource->surname,
            'email' => $this->resource->email,
            'image' => $this->resource->image,
            'description' => $this->resource->description,
            // 'roles' => $this->resource->userRoles(),
            // 'permissions' => $this->resource->userPermissions(),
        ];} else {
            return [];
        }
    }
}
