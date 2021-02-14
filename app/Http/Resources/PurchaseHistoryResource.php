<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PurchaseHistory */
class PurchaseHistoryResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'created_at' => Carbon::parse($this->created_at)->format('Y年n月j日'),

            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
