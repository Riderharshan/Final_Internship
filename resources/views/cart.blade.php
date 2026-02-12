@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">Your Cart</h2>

@if(session('cart') && count(session('cart')) > 0)

<div class="cart-wrapper reveal delay-2" id="cart-wrapper">

    @php $total = 0; @endphp

    @foreach(session('cart') as $id => $item)
        @php $total += $item['price'] * $item['quantity']; @endphp

        <div class="cart-card" id="item-{{ $id }}">
            <!-- IMAGE -->
            <div class="cart-image reveal delay-2">
                <img src="{{ asset('images/'.$item['image']) }}" alt="{{ $item['name'] }}">
            </div>

            <!-- DETAILS -->
            <div class="cart-details">
                <h3>{{ $item['name'] }}</h3>

                <p class="cart-price reveal delay-3">₹{{ number_format($item['price'], 2) }}</p>

                <!-- QUANTITY -->
                <div class="cart-quantity reveal delay-4">

                    <!-- DECREASE -->
                    <button type="button"
                            class="qty-btn"
                            onclick="decreaseQty({{ $id }}, {{ $item['quantity'] }})">
                        −
                    </button>

                    <span class="qty-number" id="qty-{{ $id }}">
                        {{ $item['quantity'] }}
                    </span>

                    <!-- INCREASE -->
                    <button type="button"
                            class="qty-btn"
                            onclick="increaseQty({{ $id }})">
                        +
                    </button>

                    <!-- DELETE ICON -->
                    <button type="button"
                            class="delete-item-btn"
                            onclick="removeItem({{ $id }})">
                        <i class="fas fa-trash"></i>
                    </button>

                </div>
            </div>
        </div>
    @endforeach

    <hr class="divider">

    <!-- FOOTER -->
    <div class="cart-footer reveal delay-3" id="cart-footer">

        <span class="cart-total">
            Total: ₹<span id="cart-total">{{ number_format($total, 2) }}</span>
        </span>

        <div class="cart-buttons">

            <!-- CLEAR CART -->
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="clear-cart-btn">
                    <i class="fas fa-trash"></i> Clear Cart
                </button>
            </form>

            <!-- CHECKOUT -->
            <a href="/checkout" class="checkout-btn reveal delay-1">
                <i class="fas fa-credit-card"></i> Proceed to Checkout
            </a>

        </div>

    </div>

</div>

@else
    @include('partials.empty-cart')
@endif


<!-- ✅ UPDATED JS (SAFE VERSION) -->
<script>

function decreaseQty(id, currentQty) {

    // 🚫 STOP at 1 (never go 0)
    if (currentQty <= 1) {
        return;
    }

    fetch('/cart/decrease', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id })
    })
    .then(res => res.json())
    .then(data => {

        document.getElementById('qty-' + id).innerText = data.quantity;
        document.getElementById('cart-total').innerText = data.total;
    });
}


function removeItem(id) {

    fetch('/remove-from-cart/' + id)
        .then(() => {
            window.location.href = "/cart";
        });
}

</script>

@endsection
