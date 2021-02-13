<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return response(MessageResource::collection($messages), Response::HTTP_OK);
    }

    public function show(Message $message)
    {
        return response(new MessageResource($message), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = Message::create($request->only('message'));

        return response(new MessageResource($data), Response::HTTP_CREATED);
    }
}
