<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\AdminLog;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAccessLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::searchProductName()
            ->searchPrice()
            ->latest()
            ->paginate();

        return response(ProductResource::collection($products), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdminLog::registerLog(1, 'create', 'product');

        $product = Product::create([
            'product_name' => $name = $request->product_name,
            'slug' => Str::slug($name),
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return response(new ProductResource($product), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        UserAccessLog::register_log([
            'user_id' => User::find(1)->id,
            'product_id' => $product->id,
        ]);

        return response(new ProductResource($product), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        AdminLog::registerLog(1, 'update', 'product');

        $product->update([
            'product_name' => $name = $request->product_name,
            'slug' => Str::slug($name),
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return response(new ProductResource($product), Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        AdminLog::registerLog(1, 'delete', 'product');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
