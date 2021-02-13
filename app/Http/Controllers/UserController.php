<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        return response(new UserResource($user), Response::HTTP_OK);
    }
}
