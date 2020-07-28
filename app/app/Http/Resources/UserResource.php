<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * @var int
     */
    private int $postsLimit;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $postsLimit)
    {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->postsLimit = $postsLimit;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load('posts');

        return $this->resource->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'posts' => new PostResource($item->posts)
            ];
        });
    }
}
