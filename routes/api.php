<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Client\CategoryController as ClientCategory;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Client\HomeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** route for admin */
Route::prefix('admin')->group(function () {

    // router xủ lý danh mục phía admin
    Route::get('category',[CategoryController::class,'index']);
    Route::post('category',[CategoryController::class,'store']);
    Route::put('category/{cate}',[CategoryController::class,'update']);
    Route::delete('category/{cate}', [CategoryController::class,'destroy']);

    //Route sản phẩm phía admin
    Route::get('product',[ProductController::class,'index']);
    Route::post('product',[ProductController::class,'store']);
    Route::put('product/{id}',[ProductController::class,'update']);
    Route::delete('product/{id}', [ProductController::class,'destroy']);

});

/** route phia nguoi dung */
Route::group([
    'namespace' => 'category',
    'prefix' => 'category'
], function (){
    Route::get('/', [ClientCategory::class, 'index']);

});

//route trang chủ người dùng
Route::get('/',[HomeController::class, 'index']);
