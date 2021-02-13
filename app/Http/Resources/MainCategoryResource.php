<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\MainCategory */
class MainCategoryResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'created_at' => $this->created_at,

            'categories' => CategoryResource::collection($this->whenLoaded('categories'))
        ];
    }
}
