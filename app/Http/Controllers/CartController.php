<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Http\Resources\CartResource;
use App\Http\Resources\UserResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['product', 'user'])->get();

        return response(CartResource::collection($carts), Response::HTTP_OK);
    }

    public function store(AddCartRequest $request)
    {
        $cart = Cart::query()->create([
            'product_id' => $request->product_id,
            'user_id' => 1,
        ]);

        return response(new CartResource($cart), Response::HTTP_CREATED);
    }

    public function checkout(Request $request)
    {
        $user = User::find(1);

        $user->money -= $request->total_price;
        $user->save();

        $cart_items = Cart::query()->where('user_id', $user->id)->get();

        foreach ($cart_items as $cart_item) {
            //購入履歴に登録
            PurchaseHistory::query()->create([
                'user_id' => $cart_item->user_id,
                'product_id' => $cart_item->product_id,
            ]);
            $cart_item->delete();
        }

        return response(new UserResource($user), Response::HTTP_CREATED);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
