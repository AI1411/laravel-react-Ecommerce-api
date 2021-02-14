<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

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

    public function scopeSearchProductName($query)
    {
        $searchInput = Request::input('product_name');

        if ($searchInput) {
            $query->where('product_name', 'like', "%${searchInput}%");
        }
        return $query;
    }

    public function scopeSearchPrice($query)
    {
        $searchInput = Request::input('price');

        if ($searchInput) {
            $query->where('price', '<', $searchInput);
        }
        return $query;
    }
}
