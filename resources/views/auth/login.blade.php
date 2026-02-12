@extends('layout.app')

@section('content')

<h2 class="page-title">Login</h2>

<div class="container">
    <div class="row align-items-center justify-content-center">

        <!-- ✅ LEFT SIDE LOTTIE ANIMATION -->
        <div class="col-md-6 text-center mb-4 mb-md-0">

            <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js" type="module"></script>

            <dotlottie-wc 
                src="https://lottie.host/8b85f41f-c454-421a-9c01-74a6e8680deb/XcLhTAneZs.lottie" 
                style="width: 500px; height: 500px;"
                autoplay 
                loop>
            </dotlottie-wc>

        </div>

        <!-- ✅ RIGHT SIDE LOGIN BOX (UNCHANGED) -->
        <div class="col-md-6">

            <div class="checkout-wrapper">
                <div class="checkout-card">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>

                        @if($errors->any())
                            <p style="color:red;">{{ $errors->first() }}</p>
                        @endif

                        <button type="submit" class="checkout-btn">
                            Login
                        </button>

                        <p style="margin-top:15px; text-align:center;">
                            <a href="{{ route('password.request') }}" style="color:red;">
                                Forgot Password?
                            </a>
                        </p>

                        <p style="margin-top:10px; text-align:center;">
                            Don’t have an account?
                            <a href="{{ route('register') }}" style="color:red;">
                                Register
                            </a>
                        </p>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
