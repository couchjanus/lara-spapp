<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            "slug"  => $this->slug,
            "description" => $this->description,
            "content" => $this->content,
            "created_at" => $this->created_at->diffForHumans(),
            "category" => new CategoryResource($this->category),
            "online" => !! $this->online,
            "creator" => $this->creator,
            "cover_path" => $this->cover_path,
            "visits" => $this->visits,
            // "comments" => CommentRessource::collection($this->whenLoaded("comments")),
            // "tags" => TagResource::collection($this->tags()->get())
        ];
    }
}
