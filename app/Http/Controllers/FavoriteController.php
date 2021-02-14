<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        $favorites = Favorite::with('product')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->paginate();

        return response(FavoriteResource::collection($favorites), Response::HTTP_OK);
    }

    public function store(CreateFavoriteRequest $request)
    {
        $favorite = Favorite::create($request->validated());

        return response(new FavoriteResource($favorite), Response::HTTP_CREATED);
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
