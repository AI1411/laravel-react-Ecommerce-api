<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMainCategoryRequest;
use App\Http\Resources\MainCategoryResource;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class MainCategoryController extends Controller
{
    public function index()
    {
        $main_categories = MainCategory::with('categories')->get();

        return response(MainCategoryResource::collection($main_categories), Response::HTTP_OK);
    }

    public function show(MainCategory $mainCategory)
    {
        return response(new MainCategoryResource($mainCategory), Response::HTTP_OK);
    }

    public function store(CreateMainCategoryRequest $request)
    {
        $main_category = MainCategory::create([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
        ]);

        return response(new MainCategoryResource($main_category), Response::HTTP_CREATED);
    }

    public function update(CreateMainCategoryRequest $request, MainCategory $mainCategory)
    {
        $mainCategory->update([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
        ]);

        return \response(new MainCategoryResource($mainCategory), Response::HTTP_ACCEPTED);
    }

    public function destroy(MainCategory $mainCategory)
    {
        $mainCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
