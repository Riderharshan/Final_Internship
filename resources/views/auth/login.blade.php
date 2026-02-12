@extends('layout.app')

@section('content')

<h2 class="page-title">Login</h2>

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

@endsection
