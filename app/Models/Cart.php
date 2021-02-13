<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalPriceAttribute()
    {
        $total = Cart::all();
        $price = 0;
        foreach ($total as $item) {
            $price += $item->product->price;
        }

        return $price;
    }
}
