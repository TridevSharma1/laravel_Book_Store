<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ✅ Fetch all products
    public function product_list()
    {
        $products = Product::all(); // get all products
        return view('product_list', compact('products'));
    }
    public function product_store_form()
    {
        
        return view('product_store');
    }
    public function product_store(Request $request)
    {
        // Validate input
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'product_price' => 'required|numeric',
            'product_description' => 'nullable|string',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('images', 'public');
        }

        // Create product
        Product::create([
            'product_name' => $request->product_name,
            'product_image' => $imagePath,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
        ]);

        // Redirect with message
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    //First we created variable and assined all data of any model
    //Then We Have to view over blade file in the written prodect list is my HTML blade file and pass the varible in the view


    // ✅ Fetch a single product by ID
    // public function show($id)
    // {
    //     $product = Product::find($id);

    //     if (!$product) {
    //         return response()->json(['message' => 'Product not found'], 404);
    //     }

    //     return response()->json($product);
    // }
}
