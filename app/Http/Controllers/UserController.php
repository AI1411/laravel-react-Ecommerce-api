<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function show()
    {
        $user = User::find(1);

        return response(new UserResource($user), Response::HTTP_OK);
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'tel' => $request->tel,
            'birthday' => $request->birthday,
            'status' => $request->status,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response(new UserResource($user), Response::HTTP_CREATED);
    }
}
