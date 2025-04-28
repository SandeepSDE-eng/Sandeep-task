<?php
// app/Http/Controllers/Api/CartController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::create([
            'user_id' => 1,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return response()->json(['message' => 'Product added to cart.', 'cart_item' => $cartItem]);
    }

    public function list()
    {
        $cartItems = CartItem::with('product.images')->where('user_id', 1)->get();
        return response()->json($cartItems);
    }
}
