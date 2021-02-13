<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
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

    public function checkout()
    {
        dd("test");
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
