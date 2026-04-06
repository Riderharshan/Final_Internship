@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endpush

@section('content')

<div class="orders-page-container">

    {{-- ── PAGE HEADER ── --}}
    <div class="orders-page-header reveal delay-1">
        <h2 class="page-title mb-0">
            <i class="fa fa-receipt" style="color:red;margin-right:10px;"></i>My Orders
        </h2>
        <a href="/profile/settings" class="orders-back-btn">
            <i class="fa fa-gear"></i> Settings
        </a>
    </div>

    {{-- ── TOAST DATA (read by JS below) ── --}}
    @if(session('review_success'))
        <span id="toast-msg" data-msg="{{ session('review_success') }}" hidden></span>
    @elseif(session('success'))
        <span id="toast-msg" data-msg="{{ session('success') }}" hidden></span>
    @endif

    {{-- ── ORDERS LIST ── --}}
    <div class="orders-list reveal delay-2">

        @forelse($orders as $order)

        <div class="order-card">

            {{-- ── ORDER HEADER BAR ── --}}
            <div class="order-card__header">
                <div class="order-card__meta">
                    <span class="order-card__label">Order Date</span>
                    <span class="order-card__value">{{ $order->created_at->format('d M Y') }}</span>
                </div>
                <div class="order-card__meta">
                    <span class="order-card__label">Total</span>
                    <span class="order-card__value order-card__total">₹{{ number_format($order->total, 2) }}</span>
                </div>
                <div class="order-card__meta">
                    <span class="order-card__label">Payment</span>
                    <span class="order-card__value">{{ strtoupper($order->payment_type) }}</span>
                </div>
                <div class="order-card__meta">
                    <span class="order-card__label">Status</span>
                    <span class="badge-paid">PAID</span>
                </div>
                <div class="order-card__actions">
                    <a href="/invoice/{{ $order->id }}" class="order-action-btn" title="View Invoice">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="/invoice/{{ $order->id }}/download" class="order-action-btn order-action-btn--outline" title="Download Invoice">
                        <i class="fa fa-download"></i>
                    </a>
                    <form method="POST" action="/reorder/{{ $order->id }}" style="margin:0;">
                        @csrf
                        <button type="submit" class="order-action-btn" title="Reorder">
                            <i class="fa fa-rotate-right"></i>
                        </button>
                    </form>
                </div>
            </div>

            {{-- ── ORDER ITEMS ── --}}
            <div class="order-card__body">
                @foreach($order->items as $item)
                <div class="order-item">

                    {{-- Product thumbnail --}}
                    <div class="order-item__img-wrap">
                        @if($item->product && $item->product->image)
                            <img src="{{ asset('images/'.$item->product->image) }}"
                                 alt="{{ $item->product_name }}"
                                 class="order-item__img">
                        @else
                            <img src="{{ asset('images/no-image.png') }}"
                                 alt="No image"
                                 class="order-item__img">
                        @endif
                    </div>

                    {{-- Product info --}}
                    <div class="order-item__info">
                        <p class="order-item__name">{{ $item->product_name }}</p>

                        @if($item->product)
                            @php
                                $review = $item->product->reviews
                                    ->where('user_id', auth()->id())
                                    ->where('order_id', $order->id)
                                    ->first();
                            @endphp

                            {{-- Existing review --}}
                            @if($review)
                            <div class="review-block review-block--existing">
                                <p class="review-block__heading">Your Review</p>
                                <div class="review-stars review-stars--display">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $review->rating ? 'star--filled' : 'star--empty' }}">
                                            {{ $i <= $review->rating ? '★' : '☆' }}
                                        </span>
                                    @endfor
                                </div>
                                <p class="review-block__text">{{ $review->review }}</p>

                                @if($review->image)
                                    <img src="{{ asset('storage/'.$review->image) }}"
                                         class="review-block__image" alt="Review image">
                                @endif

                                <div class="review-block__actions">
                                    <a href="{{ route('review.edit', $review->id) }}" class="order-btn order-btn--sm">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('review.delete', $review->id) }}" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="order-btn order-btn--sm order-btn--outline"
                                                onclick="return confirm('Delete this review?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>

                            {{-- New review form --}}
                            @else
                            <div class="review-block review-block--form">
                                <p class="review-block__heading">Rate this product</p>

                                <form method="POST"
                                      action="{{ route('review.store') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <input type="hidden" name="rating" class="rating-value">

                                    <div class="review-stars review-stars--interactive mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span onclick="setReviewRating(this, {{ $i }})">☆</span>
                                        @endfor
                                    </div>

                                    <textarea name="review"
                                              class="review-textarea"
                                              placeholder="Share your experience..."
                                              required></textarea>

                                    <div class="review-file-wrap">
                                        <label class="review-file-label">
                                            <i class="fa fa-image"></i> Add Photo (optional)
                                            <input type="file" name="image" accept="image/*">
                                        </label>
                                    </div>

                                    <button type="submit" class="order-btn order-btn--submit">
                                        <i class="fa fa-star"></i> Submit Review
                                    </button>
                                </form>
                            </div>
                            @endif

                        @endif
                    </div>{{-- .order-item__info --}}

                </div>{{-- .order-item --}}
                @endforeach
            </div>{{-- .order-card__body --}}

        </div>{{-- .order-card --}}

        @empty

        <div class="orders-empty reveal delay-2">
            <i class="fa fa-box-open orders-empty__icon"></i>
            <p>You haven't placed any orders yet.</p>
            <a href="/products" class="add-cart-btn">
                <i class="fa fa-motorcycle"></i> Start Shopping
            </a>
        </div>

        @endforelse

    </div>{{-- .orders-list --}}

</div>{{-- .orders-page-container --}}

<script>
/* ── Star rating ── */
function setReviewRating(clickedStar, rating) {
    const starsContainer = clickedStar.closest('.review-stars--interactive');
    if (!starsContainer) return;

    const form = starsContainer.closest('form');
    if (form) {
        const ratingInput = form.querySelector('.rating-value');
        if (ratingInput) ratingInput.value = rating;
    }

    const allStars = starsContainer.querySelectorAll('span');
    allStars.forEach((star, index) => {
        if (index < rating) {
            star.textContent = '★';
            star.classList.add('selected');
        } else {
            star.textContent = '☆';
            star.classList.remove('selected');
        }
    });
}

/* ── Review success toast (auto-dismiss after 4s) ── */
document.addEventListener('DOMContentLoaded', () => {
    const toastData = document.getElementById('toast-msg');
    if (!toastData) return;

    const message  = toastData.dataset.msg || 'Review submitted successfully!';
    const toast    = document.getElementById('toast');
    if (!toast) return;

    // Show
    toast.innerText      = '✅  ' + message;
    toast.style.display  = 'block';
    toast.style.opacity  = '1';
    toast.style.transition = 'opacity 0.4s ease';

    // Auto-dismiss after 4 seconds
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => { toast.style.display = 'none'; }, 400);
    }, 4000);
});
</script>

@endsection