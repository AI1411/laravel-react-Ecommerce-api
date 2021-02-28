<?php

namespace App\Http\Controllers;

use App\Http\Resources\PurchaseHistoryResource;
use App\Http\Resources\RankingResource;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $histories = PurchaseHistory::with('product')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return response(PurchaseHistoryResource::collection($histories), Response::HTTP_OK);
    }

    public function ranking()
    {
        $rankings = DB::table('purchase_histories')
            ->join('products', 'purchase_histories.product_id', 'products.id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->select(DB::raw('count(*) as product_count, product_id'), 'products.*', 'categories.slug as category_slug', 'categories.name as category_name')
            ->groupBy('product_id')
            ->get()
            ->sortByDesc('product_count');

        return response(RankingResource::collection($rankings), Response::HTTP_OK);
    }

    public function category_ranking($slug)
    {
        $rankings = DB::table('purchase_histories')
            ->join('products', 'purchase_histories.product_id', 'products.id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->select(DB::raw('count(*) as product_count, product_id'), 'products.*', 'categories.slug as category_slug', 'categories.name as category_name')
            ->where('categories.slug', $slug)
            ->groupBy('product_id')
            ->get()
            ->sortByDesc('product_count');

        return response(RankingResource::collection($rankings), Response::HTTP_OK);
    }
}
