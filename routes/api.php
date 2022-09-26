<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Client\CategoryController as ClientCategory;

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
    Route::apiResource('category',CategoryController::class);
});





/** route phia nguoi dung */
Route::group([
    'namespace' => 'category',
    'prefix' => 'category'
], function (){
    Route::get('/', [ClientCategory::class, 'index']);
});
