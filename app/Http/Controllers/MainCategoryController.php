<?php

namespace App\Http\Controllers;

use App\Http\Resources\MainCategoryResource;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MainCategoryController extends Controller
{
    public function index()
    {
        $main_categories = MainCategory::with('categories')->get();

        return response(MainCategoryResource::collection($main_categories), Response::HTTP_OK);
    }
}
