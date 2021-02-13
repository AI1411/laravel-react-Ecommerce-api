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

    public static function get_total_price(int $user_id)
    {
        $carts = self::query()->where('user_id', $user_id)->get();

        $total_price = 0;
        foreach ($carts as $cart) {
            $total_price += $cart->product->price;
        }

        return $total_price;
    }
}
