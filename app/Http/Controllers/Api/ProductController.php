<?php

// app/Http/Controllers/Api/ProductController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::with('images')->get();
        return response()->json($products);
    }

    public function index()
    {
        //$products = Product::with('images')->get();
        return view('products.index');
    }
    public function create()
    {
        //$products = Product::with('images')->get();
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'images' => 'required|array|min:1',
            'images.*' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create the new product
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        // Store the images
        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            // Store image in the 'products' folder and return the path
            $imagePaths[] = $image->store('uploads', 'public');
        }

        // Store the image paths in the ProductImage table
        foreach ($imagePaths as $path) {
            $product->images()->create(['image_path' => $path]);
        }



        return response()->json(['message' => 'Product created successfully', 'product' => $product]);
    }
}

