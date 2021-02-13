<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('user', 'UserController@index');

Route::apiResource('messages', 'MessageController');
Route::apiResource('products', 'ProductController');
Route::apiResource('categories', 'CategoryController');
Route::apiResource('carts', 'CartController')->only('index', 'destroy');
Route::post('carts/{product}', 'CartController@store');
Route::get('main_categories', 'MainCategoryController@index');

Route::post('/checkout', 'CartController@checkout');
