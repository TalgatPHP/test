<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        [
            'movie_id'=>$this->id,
            'movie_title'=>$this->title,
            'status'=>$this->status,
            'movie_category'=>$this->category->title,
            'thumbnail'=>$this->thumbnail,
        ];
    }
}
