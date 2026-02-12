@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endpush

@section('content')

<div class="container-fluid px-3 px-md-5">

<h2 class="page-title reveal delay-1 text-center text-md-start">My Orders</h2>

@if(session('review_success'))
    <div class="review-success text-center">
        {{ session('review_success') }}
    </div>
@endif

@if(session('success'))
    <div id="review-success-alert" class="review-success-alert text-center">
        {{ session('success') }}
    </div>
@endif


<div class="orders-wrapper reveal delay-4">

    <div class="orders-card card bg-black border-danger shadow-lg p-2 p-md-4">

        <!-- ✅ RESPONSIVE TABLE WRAPPER -->
        <div class="table-responsive">

        <table class="orders-table table table-dark align-middle mb-0 text-center text-md-start reveal delay-2">
            <thead class="text-danger">
                <tr>
                    <th>Products</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>

            @forelse($orders as $order)

                <!-- ORDER ROW -->
                <tr>
                    <td>
                        @foreach($order->items as $item)
                            <div class="d-flex align-items-center gap-2 mb-2 flex-wrap justify-content-center justify-content-md-start">
                                @if($item->product && $item->product->image)
                                    <img src="{{ asset('images/'.$item->product->image) }}"
                                         class="img-fluid"
                                         style="width:45px;height:45px;object-fit:contain;border:1px solid red;border-radius:6px;">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}"
                                         class="img-fluid"
                                         style="width:45px;height:45px;object-fit:contain;border:1px solid red;border-radius:6px;">
                                @endif

                                <span>{{ $item->product_name }}</span>
                            </div>
                        @endforeach
                    </td>

                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>₹{{ number_format($order->total, 2) }}</td>
                    <td>{{ strtoupper($order->payment_type) }}</td>
                    <td><span class="status-paid">PAID</span></td>

                    <td class="order-actions text-center">

                        <div class="d-flex justify-content-center gap-2 flex-wrap">

                        <a href="/invoice/{{ $order->id }}" class="action-btn small">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="/invoice/{{ $order->id }}/download"
                           class="action-btn small secondary">
                            <i class="fa fa-download"></i>
                        </a>

                        <form method="POST" action="/reorder/{{ $order->id }}">
                            @csrf
                            <button class="action-btn small">
                                <i class="fa fa-rotate-right"></i>
                            </button>
                        </form>

                        </div>

                    </td>
                </tr>

                <!-- ⭐ RATE + REVIEW -->
                <tr>
                    <td colspan="6" class="p-3 text-center">

                        @foreach($order->items as $item)

                            @if($item->product)

                                @php
                                    $review = $item->product->reviews
                                        ->where('user_id', auth()->id())
                                        ->where('order_id', $order->id)
                                        ->first();
                                @endphp

                                <div class="mb-4">

                                    @if($review)

                                        <div class="review-stars text-warning fs-3">
                                            @for($i = 1; $i <= 5; $i++)
                                                <span>{{ $i <= $review->rating ? '★' : '☆' }}</span>
                                            @endfor
                                        </div>

                                        <p class="review-text mt-2 fs-5">
                                            {{ $review->review }}</p>

                                        @if($review->image)
                                            <img src="{{ asset('storage/'.$review->image) }}"
                                                 class="review-image img-fluid rounded mb-2"
                                                 style="max-width:150px;">
                                        @endif

                                        <div class="review-actions d-flex justify-content-center gap-2 flex-wrap">
                                            <a href="{{ route('review.edit', $review->id) }}"
                                               class="action-btn small">
                                                Edit
                                            </a>

                                            <form method="POST"
                                                  action="{{ route('review.delete', $review->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="action-btn small secondary"
                                                        onclick="return confirm('Delete this review?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                    @else

                                        <form method="POST"
                                              action="{{ route('review.store') }}"
                                              enctype="multipart/form-data"
                                              class="mt-3">
                                            @csrf

                                            <input type="hidden" name="product_id"
                                                   value="{{ $item->product->id }}">
                                            <input type="hidden" name="order_id"
                                                   value="{{ $order->id }}">
                                            <input type="hidden" name="rating" class="rating-value">

                                            <div class="review-stars text-warning fs-5 mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <span onclick="setReviewRating(this, {{ $i }})">☆</span>
                                                @endfor
                                            </div>

                                            <textarea name="review"
                                                      class="review-textarea form-control mb-3"
                                                      placeholder="Share your experience..."
                                                      required></textarea>

                                            <input type="file" name="image" class="form-control mb-3">

                                            <button class="action-btn small">
                                                Submit Review
                                            </button>
                                        </form>

                                    @endif

                                </div>

                            @endif

                        @endforeach

                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="no-orders text-center p-4">
                        You have not placed any orders yet.
                        <br><br>
                        <a href="/products" class="add-cart-btn">
                            <i class="fa fa-motorcycle"></i> Start Shopping
                        </a>
                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>

        </div>

    </div>

    <div class="divider"></div>

    <div class="orders-footer text-center mt-4">
        <a href="/profile/settings" class="action-btn secondary">
            <i class="fa fa-gear"></i> Back to Settings
        </a>
    </div>

</div>

</div>


@endsection