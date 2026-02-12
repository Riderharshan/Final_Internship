@extends('layout.app')

@section('content')

<div class="product-details-wrapper reveal delay-1">
    <div class="product-details-card reveal delay-2">

        <!-- PRODUCT IMAGE -->
        <div class="product-details-image reveal delay-3">

            <img
                src="{{ $product->image ? asset('images/'.$product->image) : asset('images/no-image.png') }}"
                alt="{{ $product->name }}"
                id="zoomImage"
            >

        </div>

        <!-- PRODUCT INFO -->
        <div class="product-details-info reveal delay-1">
            <h2>{{ $product->name }}</h2>

            <div class="divider"></div>

            <p class="detail-price">
                ₹{{ number_format($product->price, 2) }}
            </p>

            <p>
                <strong>Suits For:</strong>
                <span style="color:#ccc;">{{ $product->bike_brand }}</span>
            </p>

            <p class="detail-description">
                {{ $product->description }}
            </p>

            <div style="margin-top:25px;">
                <button class="add-cart-btn" onclick="addToCart({{ $product->id }})">
                    <i class="fas fa-cart-plus"></i> Add to Cart
                </button>

                <a href="/products" class="back-link">
                    ← Back to Products
                </a>
            </div>
        </div>

    </div>
</div>

<h3 class="product-reviews-title">Customer Reviews</h3>

<div class="product-reviews-wrapper">

    @forelse($product->reviews as $review)

        <div class="review-box">

            <strong>{{ $review->user->name }}</strong>

            <!-- ⭐ STAR RATING -->
            <div class="review-stars">
                @for($i = 1; $i <= 5; $i++)
                    {{ $i <= $review->rating ? '★' : '☆' }}
                @endfor
            </div>

            <!-- REVIEW TEXT -->
            <p class="review-text">
                {{ $review->review }}
            </p>

            <!-- REVIEW IMAGE -->
            @if($review->image)
                <img src="{{ asset('storage/'.$review->image) }}"
                     class="review-image">
            @endif

        </div>

    @empty

        <p class="no-reviews">
            No reviews yet. Be the first to share your experience.
        </p>

    @endforelse

</div>




<!-- 🔍 IMAGE ZOOM SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const img = document.getElementById("zoomImage");

    if (!img) return;

    img.addEventListener("mousemove", (e) => {
        const rect = img.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;

        img.style.transformOrigin = `${x}% ${y}%`;
        img.style.transform = "scale(2)";
    });

    img.addEventListener("mouseleave", () => {
        img.style.transformOrigin = "center center";
        img.style.transform = "scale(1)";
    });
});
</script>

@endsection
