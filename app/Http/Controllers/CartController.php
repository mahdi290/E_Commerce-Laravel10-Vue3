<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function index()
    {
        $cart = CartModel::all()->toArray();
        return array_reverse($cart);
    }

    public function store(Request $request)
{
    $cartItem = new CartModel([
        'product_id' => $request->input('product_id'),
        'user_name' => $request->input('username'), // Assuming 'username' is the field in your request
        'quantity' => 1,
    ]);

    $cartItem->save();

    return response()->json($cartItem, 201);
}


    public function show($id)
    {
        $cartItem = CartModel::find($id);

        return response()->json($cartItem);
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartModel::find($id);
        $cartItem->update($request->all());

        return response()->json($cartItem, 200);
    }

    public function destroy($id)
    {
        $cartItem = CartModel::find($id);

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Cart item deleted successfully']);
        } else {
            return response()->json(['message' => 'Cart item not found'], 500);
        }
    }

    public function destroyByProduct($product)
    {
        $cartItems = CartModel::where('product_id', $product)->get();

        if ($cartItems->isNotEmpty()) {
            $cartItems->each(function ($cartItem) {
                $cartItem->delete();
            });

            return response()->json(['message' => 'All cart items with product_id deleted successfully']);
        } else {
            return response()->json(['message' => 'No cart items found with the specified product_id'], 500);
        }
    }

    public function index2(Request $request)
    {
        try {
            $cartProductIds = $request->query('cart');

            if ($cartProductIds) {
                $cartProductIds = explode(',', $cartProductIds);
                $products = ProductModel::whereIn('id', $cartProductIds)->get();
            } else {
                $products = ProductModel::all();
            }

            return response()->json($products);
        } catch (\Exception $e) {
            Log::error('Error fetching cart: ' . $e->getMessage());
            return Response::json(['error' => 'Error fetching cart'], 500);
        }
    }

    public function getCartsByUsername(Request $request) {
        
        try {
            $username = $request->input('Username');
          
            $carts = CartModel::where('user_name', $username)->get();
    
            // Log success
            Log::info("Successfully retrieved carts for username: $username");
            
            return response()->json($carts);
        } catch (\Exception $e) {
            // Log error
            Log::error("Error fetching carts for username: $username. Error message: " . $e->getMessage());
            
            return response()->json(['error' => 'An error occurred while fetching carts.'], 500);
        }
    }
    
}
