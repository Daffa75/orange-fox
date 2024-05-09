<?php
namespace App\Filament\Resources\PerikananPostResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class PerikananPostTransformer extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'article' => $this->article,
            'author' => $this->author,
            'published_at' => $this->published_at,
            'thumbnail' => $this->media->pluck('original_url')->first(),
        ];

        // return $this->resource->toArray();
        
    }
}