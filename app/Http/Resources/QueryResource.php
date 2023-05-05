<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QueryResource extends JsonResource
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
                'title' => $this->resource->title,
                'content' => $this->resource->content,
                'status' => $this->resource->status,
                'comment' => $this->resource->comment,
                'date_create' => $date,
            ];} else {
            return [];
        }
    }
}
