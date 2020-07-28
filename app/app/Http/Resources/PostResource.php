<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
        $this->resource->load('image');

        return $this->resource->map(function ($item) {

            return [
                'id' => $item->id,
                'content' => $item->content,
                'created_at_ts' => Carbon::parse($item->created_at)->timestamp,
                'image_url' => $item->image->url ?? null,
            ];
        });
    }
}
