<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\AdminLog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function store(CreateCategoryRequest $request)
    {
        AdminLog::registerLog(1, 'create', 'category');

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'main_category_id' => $request->main_category_id,
        ]);

        return response(new CategoryResource($category), Response::HTTP_CREATED);
    }

    public function update(Request $request, Category $category)
    {
        AdminLog::registerLog(1, 'update', 'category');

        $category->update([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
            'main_category_id' => $request->main_category_id,
        ]);

        return response(new CategoryResource($category), Response::HTTP_ACCEPTED);
    }

    public function destroy(Category $category)
    {
        AdminLog::registerLog(1, 'delete', 'category');

        $category->delete();

        $category->products()->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
