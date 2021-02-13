<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();

        return response(CategoryResource::collection($categories), Response::HTTP_OK);
    }

    public function show(Category $category)
    {
        return response(new CategoryResource($category), Response::HTTP_OK);
    }
}
