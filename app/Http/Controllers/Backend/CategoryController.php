<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function index(){

        $cate = Category::all();

        return new ResourceCollection($cate);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $cate = Category::create($request->all());

        return new JsonResource($cate);
    }

    public function update(Request $request, Category $cate)
    {
//        dd($cate);
        $cate->update($request->all());

        return new JsonResource($cate);
    }

    public function destroy(Category $cate)
    {
        $cate->delete();

        return response(null, 204);
    }

}
