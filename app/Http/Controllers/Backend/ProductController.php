<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /** hiển thị sản phẩm */
    public function index()
    {
        $products = Product::all();

        return response()->json([
            "success" => 200,
            "message" => "Product List",
            "data" => $products
        ]);
    }

    /** tạo mới sản phẩm*/
    public function store(Request $request)
    {
      $pro = Product::create($request->all());

        return response()->json([
            'status' => '200',
            'message' => 'Product is created',
            'data' => $pro
        ]);
    }

    /** cập nhập sản phẩm */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'image' => $request->image,
            'desc' => $request->desc,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ];

        $product->update($data);

        return response()->json([
            'status' => '200',
            'message' => 'Product is updated',
            'data' => $product
        ]);
    }

    /** xóa sản phẩm*/
    public function destroy($id)
    {
        $desProduct = Product::deleted($id);
        return "Product id deleted";
    }
}
