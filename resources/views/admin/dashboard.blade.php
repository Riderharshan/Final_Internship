@extends('admin.layout')

@section('content')

<!-- BRAND LOGO / HERO -->
<section class="brand-hero reveal delay-1">
    <img src="{{ asset('images/web-logo.png') }}" alt="Rider's Den Logo">
    <h1>Rider’s Den</h1>
    <p>Built for Riders. Trusted for Performance.</p>
</section>
<div class="divider reveal delay-2"></div>

<h2 class="page-title">Admin Dashboard</h2>




<div class="admin-actions">

    <a href="{{ route('admin.products.create') }}" class="action-btn secondary">
        <i class="fas fa-plus"></i>
        Add Product
    </a>

    <a href="{{ route('admin.products') }}" class="action-btn secondary">
        <i class="fas fa-box"></i>
        View Products
    </a>

    <a href="{{ route('admin.orders') }}" class="action-btn secondary">
        <i class="fas fa-shopping-cart"></i>
        Orders
    </a>

    <a href="{{ route('admin.users') }}" class="action-btn secondary">
        <i class="fas fa-users"></i>
        Users
    </a>

</div>


@endsection
