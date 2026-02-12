@extends('layout.app')

@section('content')

<h2 class="page-title">Create Account</h2>

<div class="checkout-wrapper">
    <div class="checkout-card">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" required>
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

@endsection
