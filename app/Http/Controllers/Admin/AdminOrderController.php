<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.admin-orders', compact('orders'));
    }

    public function updateStatus(Request $request)
{
    $order = Order::findOrFail($request->order_id);

    $order->status = $request->status;

    if ($request->status === 'out_for_delivery') {
        $order->out_for_delivery_at = now(); // ⭐ FIX
    }

    $order->save();

    return back()->with('success', 'Order status updated');
}

    
    public function show(Order $order)
{
    $order->load([
        'items.product',   // product details
        'user.addresses'   // saved addresses
    ]);

    return view('admin.order-show', compact('order'));
}
}
