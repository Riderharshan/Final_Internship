@extends('layout.app')

@section('content')

<h2 class="page-title">Create Account</h2>

<div class="container">
    <div class="row align-items-center justify-content-center">

        <!-- ✅ LEFT SIDE LOTTIE ANIMATION -->
<div class="col-md-6 text-center mb-4 mb-md-0 d-flex align-items-start justify-content-center"
     style="margin-top:-200px;">

    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js" type="module"></script>

    <dotlottie-wc 
        src="https://lottie.host/785bb98b-f7f3-4396-9212-22eb4890de85/ZaMv9xLP7A.lottie"
        style="width: 500px; height: 500px;"
        autoplay 
        loop>
    </dotlottie-wc>

</div>


        <!-- ✅ RIGHT SIDE REGISTER BOX (UNCHANGED) -->
        <div class="col-md-6">

            <div class="checkout-wrapper">
                <div class="checkout-card">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
    <label>Full Name</label>
    <input type="text" name="name" required>
</div>


                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="checkout-btn">
                            Register
                        </button>

                        <p style="margin-top:15px; text-align:center;">
                            Already have an account?
                            <a href="{{ route('login') }}" style="color:red;">
                                Login
                            </a>
                        </p>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
