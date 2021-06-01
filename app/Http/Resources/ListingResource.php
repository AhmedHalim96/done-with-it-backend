<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "price" => $this->price,
            "price" => $this->user_id,
            "description" => ($this->description) ? $this->description : null,
            "photos" => ($this->photos) ? PhotoResource::collection($this->photos) : null,
            "category" => ($this->category) ? new CategoryResource($this->category) : null,
            "created_at" => $this->created_at,
        ];
    }
}
