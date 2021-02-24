<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RankingResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_count' => $this->product_count,
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'image' => url($this->image),
            'category_id' => $this->category_id,
            'price' => $this->price,
            'slug' => $this->slug,
            'category_slug' => $this->category_slug,
        ];
    }
}
