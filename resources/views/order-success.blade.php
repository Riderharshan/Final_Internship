@extends('layout.app')

@section('content')

<div style="
    min-height:70vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
">

    <h2 class="page-title">Payment Successful</h2>

    <!-- LOTTIE SCRIPT -->
    <script
      src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js"
      type="module">
    </script>

    <!-- ANIMATION -->
    <dotlottie-wc
      src="https://lottie.host/da8dec49-8e04-45d0-8ec4-8cbe1023d5fa/d38jFJlhYu.lottie"
      style="width: 280px; height: 280px; margin:20px 0;"
      autoplay
      loop>
    </dotlottie-wc>

    <p style="color:#ccc; font-size:16px;">
        Please wait while we generate your invoice...
    </p>

</div>

<script>
    // Redirect after 3 seconds
    setTimeout(function () {
        window.location.href = "{{ url('/invoice/'.$orderId) }}";
    }, 3000);
</script>

@endsection
