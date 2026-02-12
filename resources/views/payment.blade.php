@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">Secure Payment</h2>



<div class="payment-wrapper reveal delay-2">

    <form method="POST" action="/place-order" class="payment-card">
        @csrf

        <h3 class="section-title reveal delay-3">Select Payment Method</h3>

        <!-- CASH -->
        <label class="payment-option" onclick="hideQR()">
            <input type="radio" name="payment_type" value="cash" required>
            <span>
                <i class="fa fa-money-bill reveal delay-4"></i>
                Cash on Delivery
            </span>
        </label>

        <!-- UPI -->
        <label class="payment-option" onclick="showQR()">
            <input type="radio" name="payment_type" value="upi" required>
            <span>
                <i class="fa fa-qrcode reveal delay-3"></i>
                UPI Payment
            </span>
        </label>

        <!-- QR SECTION -->
        <div id="upi-qr" class="upi-box">
            <p>Scan & Pay using UPI</p>
            <img src="{{ asset('images/upi-qr.jpeg') }}"
                 alt="UPI QR Code">
        </div>

        <div class="divider"></div>

        <button type="submit" class="pay-btn">
            <i class="fa fa-check-circle reveal delay-4"></i>
            Payment Done
        </button>

    </form>

</div>

<script>
function showQR() {
    document.getElementById('upi-qr').style.display = 'block';
}

function hideQR() {
    document.getElementById('upi-qr').style.display = 'none';
}
</script>

@endsection
