<?php

namespace App\Http\Controllers;

use App\Http\Resources\RankingResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class RankingController extends Controller
{
    public function category_ranking($slug = '')
    {
        $rankings = DB::table('purchase_histories')
            ->join('products', 'purchase_histories.product_id', 'products.id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->select(DB::raw('count(*) as product_count, product_id'), 'products.*', 'categories.slug as category_slug', 'categories.name as category_name')
            ->orWhere('categories.slug', $slug)
            ->groupBy('product_id')
            ->get()
            ->sortByDesc('product_count');

        return response(RankingResource::collection($rankings), Response::HTTP_OK);
    }
}
