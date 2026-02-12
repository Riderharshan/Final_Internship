@extends('layout.app')

@section('content')

<!-- PAGE TITLE -->
<h2 class="page-title reveal delay-1">Products</h2>

<!-- SEARCH BAR -->
<div class="search-under-header reveal delay-1">

    <!-- DESKTOP VERSION (Original Design Preserved) -->
    <div class="d-none d-md-block">
        <form method="GET" action="/products" class="search-form reveal delay-2">
            <input
                type="text"
                name="search"
                placeholder="Search products..."
                value="{{ request('search') }}"
            >
            <button type="submit">
                <i class="fa fa-search reveal delay-3"></i>
            </button>
        </form>
    </div>

    <!-- MOBILE VERSION (Bootstrap Only for Mobile) -->
    <div class="d-md-none px-3">
        <form method="GET" action="/products">
            <div class="input-group">
                <input
                    type="text"
                    name="search"
                    placeholder="Search products..."
                    value="{{ request('search') }}"
                    class="form-control bg-dark text-white border-danger"
                >
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>

</div>

<!-- BROWSE BY CATEGORY -->
<h3 class="section-title reveal delay-3">Browse by Category</h3>

<!-- DESKTOP CATEGORY BAR (Original Layout Preserved) -->
<div class="category-bar reveal delay-4 d-none d-md-block">

    <a href="/products"
       class="category-btn {{ request()->is('products') && !request('search') ? 'active' : '' }}">
        All
    </a>

    <a href="/products?search=lubricants" class="category-btn">
        Lubricants
    </a>

    <a href="/products?search=electronics" class="category-btn">
        Electronics
    </a>

    <a href="/products?search=exhaust" class="category-btn">
        Exhaust
    </a>

    <a href="/products?search=helmets" class="category-btn">
        Helmets
    </a>

    <a href="/products?search=riding gear" class="category-btn">
        Riding Gears
    </a>

    @foreach($categories as $category)
        <a href="/category/{{ $category->id }}"
           class="category-btn {{ request()->is('category/'.$category->id) ? 'active' : '' }}">
            {{ $category->name }}
        </a>
    @endforeach

</div>

<!-- MOBILE CATEGORY DROPDOWN -->
<div class="d-md-none text-center mb-4 px-3">

    <div class="dropdown">
        <button class="btn btn-outline-danger w-100 dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown">
            Select Category
        </button>

        <ul class="dropdown-menu dropdown-menu-dark w-100">

            <li><a class="dropdown-item" href="/products">All</a></li>
            <li><a class="dropdown-item" href="/products?search=lubricants">Lubricants</a></li>
            <li><a class="dropdown-item" href="/products?search=electronics">Electronics</a></li>
            <li><a class="dropdown-item" href="/products?search=exhaust">Exhaust</a></li>
            <li><a class="dropdown-item" href="/products?search=helmets">Helmets</a></li>
            <li><a class="dropdown-item" href="/products?search=riding gear">Riding Gears</a></li>

            @foreach($categories as $category)
                <li>
                    <a class="dropdown-item"
                       href="/category/{{ $category->id }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>

</div>

<div class="divider reveal delay-1"></div>

<!-- PRODUCTS GRID (YOUR ORIGINAL GRID UNTOUCHED) -->
<div class="product-grid">

    @forelse($products as $product)

        <div class="product-card">

            <!-- IMAGE -->
            <div class="product-image reveal delay-3">
                @if($product->image)
                    <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/no-image.png') }}" alt="No Image">
                @endif
            </div>

            <!-- NAME -->
            <h3 class="product-name reveal delay-2">
                {{ $product->name }}
            </h3>

            <!-- PRICE -->
            <p class="product-price reveal delay-4">
                ₹{{ number_format($product->price, 2) }}
            </p>

            <p style="color:red;">
                ⭐ {{ $product->averageRating() ?? 'No ratings yet' }}
            </p>

            <!-- ACTIONS -->
            <div class="product-actions reveal delay-1">

                <button class="add-cart-btn reveal delay-3"
                        onclick="addToCart({{ $product->id }})">
                    <i class="fa fa-cart-plus reveal delay-4"></i> Add to Cart
                </button>

                <a href="/products/{{ $product->id }}" class="info-btn">
                    <i class="fa fa-circle-info reveal delay-2"></i> Info
                </a>

            </div>

        </div>

    @empty

        <!-- CENTERED EMPTY STATE -->
        <div style="grid-column:1 / -1; margin-top:50px; display:flex; flex-direction:column; align-items:center; justify-content:center;">

            <script
                src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js"
                type="module">
            </script>

            <dotlottie-wc
                src="https://lottie.host/f8ff8c54-b674-4572-b42f-4aea8dc3f355/5FssoEDpIb.lottie"
                style="width:350px; height:350px;"
                autoplay
                loop>
            </dotlottie-wc>

            <h3 class="not-found-text reveal delay-1">
                Product not found
            </h3>

        </div>

    @endforelse

</div>

@endsection
