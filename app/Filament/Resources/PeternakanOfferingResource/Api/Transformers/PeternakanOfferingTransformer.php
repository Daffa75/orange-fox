<?php
namespace App\Filament\Resources\PeternakanOfferingResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class PeternakanOfferingTransformer extends JsonResource
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
            'description' => $this->description,
            'author' => $this->author,
            'price' => $this->price,
            'qty' => $this->qty,
            'whatsapp' => $this->contact,
            'created_at' => $this->created_at,
            'media' => $this->media->pluck('original_url'),
        ];        
    }
}
