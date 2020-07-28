<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load('post');

        return $this->resource->map(function ($item) {
            return [
                'id' => $item->id,
                'post_id' => $item->post_id,
                'commentator_id' => $item->commentator_id,
                'content' => $item->content,
                'created_at' => Carbon::parse($item->created_at)->timestamp,
            ];
        })
            ->sortByDesc('created_at');
    }
}
