<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'slug' => $this->slug,
            'image' => url('images/products/' . $this->image),
            'price' => $this->price,
            'tax' => $this->tax,
            'price_include_tax' => $this->price_include_tax,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'tag_id' => $this->tag_id,
            'created_at' => $this->created_at->format('Y年n月j日'),
        ];
    }
}
