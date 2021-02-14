<?php

namespace App\Http\Controllers;

use App\Http\Resources\PurchaseHistoryResource;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $histories = PurchaseHistory::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return response(PurchaseHistoryResource::collection($histories), Response::HTTP_OK);
    }
}
