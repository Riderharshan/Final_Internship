@extends('admin.layout')


@section('content')

<h2 class="page-title">Order #{{ $order->id }} Details</h2>

{{-- ================= PRODUCTS ================= --}}
<div class="admin-card">
    <h3>Products</h3>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Product ID</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>
    @if($item->product && $item->product->image)
        <img src="{{ asset('images/' . $item->product->image) }}"
             width="60"
             style="border-radius:8px;">
    @else
        <span>No Image</span>
    @endif
</td>


                <td>{{ $item->product_name }}</td>
                <td>#{{ $item->product_id }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


{{-- ================= PAYMENT ================= --}}
<div class="admin-card">
    <h3>Payment Information</h3>
    <p><strong>Method:</strong> {{ ucfirst($order->payment_type) }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->payment_status) }}</p>
</div>

{{-- ================= ADDRESS ================= --}}
{{-- ================= DELIVERY ADDRESS ================= --}}
<div class="admin-card">
    <h3>Delivery Address</h3>

    @if($order->address)
        <p><strong>Name:</strong> {{ $order->customer_name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>

        <p><strong>Address:</strong><br>
            {{ $order->address }}
        </p>

        @if($order->map_link)
    <button onclick="this.nextElementSibling.classList.toggle('hide')"
            class="action-btn secondary">
        Show Location
    </button>

    <div class="hide" style="margin-top:10px;">
        <a href="{{ $order->map_link }}" target="_blank">
            {{ $order->map_link }}
        </a>
    </div>
@endif


    @else
        <p>No address found.</p>
    @endif
</div>


@endsection
