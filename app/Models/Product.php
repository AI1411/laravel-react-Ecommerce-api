<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function pruchase_histories()
    {
        return $this->hasMany(PurchaseHistory::class);
    }

    public function getTaxAttribute()
    {
        return floor($this->price * config('const.tax'));
    }

    public function getPriceIncludeTaxAttribute()
    {
        return $this->price + $this->tax;
    }
}
