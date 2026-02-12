<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Show add product form
    public function create()
    {
        $categories = Category::all();
        return view('admin.add-product', compact('categories'));
    }

    // Store product with image
    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'bike_brand' => $request->bike_brand,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect('/admin/products')->with('success', 'Product added successfully!');
    }

    // Admin product list
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    // Delete product + image
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        $product->delete();

        return redirect('/admin/products')->with('success', 'Product deleted successfully!');
    }
   

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::orderBy('name')->get();

    return view('admin.edit-product', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'bike_brand' => 'required',
        'category_id' => 'required',
        'description' => 'nullable',
        'image' => 'nullable|image'
    ]);

    $product->name = $request->name;
    $product->price = $request->price;
    $product->bike_brand = $request->bike_brand;
    $product->category_id = $request->category_id;
    $product->description = $request->description;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()
        ->route('admin.products')
        ->with('success', 'Product updated successfully');
}

}
