<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['product'] = Product::all();

        $data['category']= Category::limit(5)->get();

        return response()->json([
            "status" => 200,
            "message" => "success",
            "data" => $data
        ]);
    }
}
