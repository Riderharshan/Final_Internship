@extends('layout.app')

@section('content')

<h2 class="page-titlereveal delay-1">Order Status</h2>

@if(is_null($order))

    {{-- 🎉 NO ACTIVE ORDER / DELIVERED --}}
    <div class="empty-cart-wrapper" style="text-align:center;">

        <script
          src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js"
          type="module">
        </script>

        <dotlottie-wc
          src="https://lottie.host/8a7d5d68-ea7d-4408-94dd-21ba28850fc4/bbefi0kh1j.lottie"
          style="width:280px;height:280px;margin:auto;"
          autoplay
          loop>
        </dotlottie-wc>

        <h3 style="margin-top:15px; color:#e53935;">
            No orders yet
        </h3>

        <p>You haven’t placed any orders yet. Start shopping to place your first order.</p>

        <a href="/products" class="empty-cart-btn">
            <i class="fa fa-motorcycle"></i> Shop Now
        </a>

    </div>

@else

    {{-- 🟢 ACTIVE ORDER --}}
    <div class="order-status-wrapper reveal delay-2">

        {{-- 📦 ORDERED PRODUCT PREVIEW (ATTRACTIVE CARD) --}}
        {{-- 📦 ORDERED PRODUCTS PREVIEW (MULTIPLE) --}}
@if($order->items->count())

<div class="order-products-row">

    @foreach($order->items as $item)
        <div class="order-product-card">

            <div class="order-product-image">
                <img src="{{ asset('images/' . $item->product->image) }}"
                     alt="{{ $item->product_name }}">
            </div>

            <div class="order-product-name">
                {{ $item->product_name }}
            </div>

        </div>
    @endforeach

</div>

@endif

        {{-- 🚚 ORDER STATUS TIMELINE --}}
        <div class="status-track reveal delay-3">

            <div class="status-step {{ $order->status === 'packed' ? 'active' : 'dim' }}">
                <i class="fa fa-box"></i>
                <span>Packed</span>
            </div>

            <div class="status-line"></div>

            <div class="status-step {{ $order->status === 'shipped' ? 'active' : 'dim' }}">
                <i class="fa fa-truck-fast"></i>
                <span>Shipped</span>
            </div>

            <div class="status-line"></div>

            <div class="status-step {{ $order->status === 'out_for_delivery' ? 'active' : 'dim' }}">
                <i class="fa fa-location-dot"></i>
                <span>Out for Delivery</span>

                @if(!empty($order->out_for_delivery_at))
                    <small>
                        {{ \Carbon\Carbon::parse($order->out_for_delivery_at)->format('d M Y, h:i A') }}
                    </small>
                @endif
            </div>

        </div>

        {{-- ✅ DELIVERED BUTTON --}}
        <form method="POST"
              action="/order-delivered"
              style="margin-top:40px;text-align:center;">
            @csrf
            <button class="action-btn">
                <i class="fa fa-check"></i> Delivered
            </button>
        </form>

    </div>

@endif

@endsection
