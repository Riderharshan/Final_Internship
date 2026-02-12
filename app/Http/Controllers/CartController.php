<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Add product to cart
    public function addAjax($id)
{
    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image,
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'message' => 'Item added to cart'
    ]);
}


    // View cart
    public function view()
    {
        return view('cart');
    }

    // Remove item
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }
  public function increaseAjax(Request $request)
{
    $id = $request->id;
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
        session()->put('cart', $cart);
    }

    return response()->json([
        'quantity' => $cart[$id]['quantity'],
        'total' => $this->cartTotal($cart)
    ]);
}

public function decreaseAjax(Request $request)
{
    $id = $request->id;
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {

        // 🚫 STOP at 1
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        }

        session()->put('cart', $cart);
    }

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return response()->json([
        'quantity' => $cart[$id]['quantity'],
        'total' => number_format($total, 2)
    ]);
}


private function cartTotal($cart)
{
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return number_format($total, 2);
}


}
