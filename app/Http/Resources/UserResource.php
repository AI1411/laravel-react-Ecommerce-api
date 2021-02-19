<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'name' => $this->name,
            'gender' => $this->gender,
            'address' => $this->address,
            'tel' => $this->tel,
            'birthday' => $this->birthday,
            'status' => [
                'text' => $this->status === 1 ? 'active' : 'not active',
                'class' => $this->status === 1 ? 'green' : 'red',
            ],
            'money' => $this->money,
            'image' => url($this->image) ?? asset('images/users/no-image.png'),
            'email' => $this->email,
            'created_at' => Carbon::parse($this->created_at)->format('Y年n月j日'),

            'carts' => CartResource::collection($this->whenLoaded('carts')),
        ];
    }
}
