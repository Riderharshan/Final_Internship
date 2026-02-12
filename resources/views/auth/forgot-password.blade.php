@extends('layout.app')

@section('content')

<h2 class="page-title">Forgot Password</h2>

<div class="checkout-wrapper">
    <div class="checkout-card" style="text-align:center;">

        <p style="color:#ccc; font-size:16px; margin-bottom:20px;">
            Password reset via email will be enabled soon.
        </p>

        <p style="color:#aaa;">
            Please contact support if you need help.
        </p>

        <a href="/login" class="checkout-btn" style="margin-top:25px;">
            Back to Login
        </a>

    </div>
</div>

@endsection
