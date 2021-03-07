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
            "description" => ($this->description) ? $this->description : NULL,
            "photo" => $this->photo,
            "category" => ($this->category)? new CategoryResource($this->category) : NULL,
            "creted_at" => $this->created_at
        ];
    }
}
