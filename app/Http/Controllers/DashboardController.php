<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $users = User::count();
        $products = Product::count();
        $category = Category::count();
        $main_category = MainCategory::count();
        $data['user_count'] = $users;
        $data['products'] = $products;
        $data['category'] = $category;
        $data['main_category'] = $main_category;

        return json_encode($data);
    }
}
