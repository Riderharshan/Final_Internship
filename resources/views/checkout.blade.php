@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">Checkout</h2>



<div class="checkout-wrapper">

    <div class="checkout-card reveal delay-2">

        <form method="POST" action="/checkout">
    @csrf
     
    <!-- NAME -->
    <div class="form-group reveal delay-2">
        <label>
            <i class="fas fa-user reveal delay-3"></i> Name
        </label>
        <input type="text"
               name="name"
               placeholder="Enter your full name"
               required>
    </div>

    <!-- EMAIL -->
    <div class="form-group reveal delay-2">
        <label>
            <i class="fas fa-envelope reveal delay-3"></i> Email
        </label>
        <input type="email"
               name="email"
               placeholder="Enter your email address"
               required>
    </div>

    <!-- PHONE -->
    <div class="form-group reveal delay-2">
        <label>
            <i class="fas fa-phone reveal delay-3"></i> Phone Number
        </label>
        <input type="tel"
               name="phone"
               placeholder="Enter your phone number"
               required>
    </div>

    <!-- ADDRESS -->
    <div class="form-group reveal delay-2">
        <label>
            <i class="fas fa-location-dot reveal delay-3"></i> Delivery Address
        </label>
        <textarea name="address"
                  rows="4"
                  placeholder="Enter full delivery address"
                  required></textarea>
    </div>

    <!-- ⭐ MAP LINK (NEW – DO NOT REMOVE) -->
    <input type="hidden" name="map_link" id="map_link">

    @if($addresses->count())
        <h3 class="section-title reveal delay-1">Select Saved Address</h3>

        <div class="saved-address-list">
            @foreach($addresses as $addr)
                <label class="saved-address-card">
                    <input type="radio" name="saved_address"
                           onclick='fillAddress(@json($addr))'>

                    <div class="address-content">
                        <strong>{{ ucfirst($addr->label) }}</strong>
                        <p>{{ $addr->address }}</p>
                        <small>{{ $addr->email }} · {{ $addr->city }} – {{ $addr->pincode }}</small>
                        <small>{{ $addr->city }} – {{ $addr->pincode }}</small>
                    </div>
                </label>
            @endforeach
        </div>
    @endif

    <div class="divider"></div>

    <!-- SUBMIT -->
    <button type="submit" class="checkout-btn reveal delay-2">
        <i class="fas fa-credit-card reveal delay-3 "></i>
        Proceed to Payment
    </button>

</form>


    </div>

</div>
<script>
function fillAddress(addr) {
    document.querySelector('[name=name]').value = addr.name;
    document.querySelector('[name=email]').value = addr.email;
    document.querySelector('[name=phone]').value = addr.phone;
    document.querySelector('[name=address]').value = addr.address;

    const mapInput = document.getElementById('map_link');
    mapInput.value = addr.map_link ?? '';

    // 🔴 DEBUG (IMPORTANT)
    console.log('MAP LINK SET TO:', mapInput.value);
}
</script>



@endsection
