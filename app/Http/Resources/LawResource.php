<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LawResource extends JsonResource
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
            if ($this->resource->date_create != null){
                $date = $this->resource->date_create->format('d.m.Y');
            } else {
                $date = $this->resource->date_create;
            }

            return [
                'id' => $this->resource->id,
                'user_id' => $this->resource->user_id,
                'science_degree' => $this->resource->science_degree,
                'place_study' => $this->resource->place_study,
                'about_me' => $this->resource->about_me,
                'image' => $this->resource->image,
                'status' => $this->resource->status,
                'date_create' => $date,
            ];} else {
            return [];
        }
    }
}
