<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;

class ProductController extends Controller
{
    // Show all products
    public function index(Request $request)
{
    $categories = Category::all();

    $search = $request->query('search');

    $products = Product::when($search, function ($query, $search) {
        $query->where('name', 'LIKE', "%{$search}%");
    })->get();

    return view('products', compact('products', 'categories', 'search'));
}


    // Show single product details
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-details', compact('product'));
    }

    // Category-wise filtering
    public function category($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();

        return view('products', compact('products', 'categories'));
    }
    

public function rate(Request $request)
{
    Rating::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ],
        [
            'rating' => $request->rating
        ]
    );

    return back()->with('success', 'Thanks for rating!');
}
public function destroy($id)
{
    Product::findOrFail($id)->delete();
    return back()->with('success', 'Product deleted successfully');
}


}
