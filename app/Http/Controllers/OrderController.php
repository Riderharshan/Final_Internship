<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // 1️⃣ Checkout page
    public function checkout()
    {
        $addresses = auth()->user()->addresses;
        return view('checkout', compact('addresses'));
    }

    // 2️⃣ Store checkout info
    public function storeCheckout(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'address' => 'required',
        ]);

        session([
            'checkout_name'    => $request->name,
            'checkout_email'   => $request->email,
            'checkout_phone'   => $request->phone,
            'checkout_address' => $request->address,
        ]);

        return redirect('/payment');
    }

    // 3️⃣ Payment page
    public function payment()
    {
        if (!session()->has('checkout_name')) {
            return redirect('/checkout');
        }

        return view('payment');
    }

    // 4️⃣ Place Order
    public function placeOrder(Request $request)
    {
        $cart = session('cart');

        if (!$cart) {
            return redirect('/products');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id'        => auth()->id(),
            'customer_name'  => session('checkout_name'),
            'email'          => session('checkout_email'),
            'phone'          => session('checkout_phone') ?? $request->phone,
            'address'        => session('checkout_address'),
            'map_link'       => $request->map_link,
            'total'          => $total,
            'payment_type'   => $request->payment_type,
            'payment_status' => 'paid',
            'status'         => 'packed',
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $productId,
                'product_name' => $item['name'],
                'price'        => $item['price'],
                'quantity'     => $item['quantity'],
            ]);
        }

        session()->forget('cart');
        session()->forget([
            'checkout_name',
            'checkout_email',
            'checkout_phone',
            'checkout_address'
        ]);

        return redirect('/order-success/' . $order->id);
    }

    // 5️⃣ My Orders (✅ FIXED)
    public function myOrders()
    {
        $orders = Order::with([
            'items.product.ratings' => function ($q) {
                $q->where('user_id', auth()->id());
            }
        ])
        ->where('user_id', auth()->id())   // ✅ FIX
        ->where('status', 'delivered')     // ✅ ONLY DELIVERED
        ->orderBy('id', 'desc')
        ->get();

        return view('my-orders', compact('orders'));
    }

    // 6️⃣ Reorder
    public function reorder(Order $order)
    {
        $cart = session()->get('cart', []);

        foreach ($order->items as $item) {
            if (!$item->product) continue;

            if (isset($cart[$item->product->id])) {
                $cart[$item->product->id]['quantity'] += $item->quantity;
            } else {
                $cart[$item->product->id] = [
                    'name'     => $item->product->name,
                    'price'    => $item->product->price,
                    'quantity' => $item->quantity,
                    'image'    => $item->product->image,
                ];
            }
        }

        session()->put('cart', $cart);

        return redirect('/cart')->with('success', 'Items added to cart');
    }

    // =========================
    // 🔴 ORDER STATUS (USER)
    // =========================

    public function orderStatus()
    {
        $order = Order::where('user_id', auth()->id())
            ->where('status', '!=', 'delivered')
            ->latest()
            ->first();

        return view('order-status', compact('order'));
    }

    public function markDelivered()
    {
        $order = Order::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->first();

        if ($order && $order->status !== 'delivered') {
            $order->status = 'delivered';
            $order->save();
        }

        return redirect('/order-status');
    }

    // =========================
    // 🔵 ADMIN
    // =========================

    public function adminOrders()
    {
        $orders = Order::latest()->get();
        return view('admin-orders', compact('orders'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status'   => 'required'
        ]);

        $order = Order::findOrFail($request->order_id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order status updated');
    }
}
