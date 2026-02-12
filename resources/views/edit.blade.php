@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">Edit Review</h2>

<div class="orders-wrapper">
    <div class="orders-card edit-review-card reveal delay-2">

        <form method="POST"
              action="{{ route('review.update', $review->id) }}"
              enctype="multipart/form-data"
              class="edit-review-form">
            @csrf
            @method('PUT')

            <!-- ⭐ RATING -->
            <div class="form-group">
                <label class="form-label">Rating</label>

                <div class="review-stars edit-stars">
                    @for($i = 1; $i <= 5; $i++)
                        <span onclick="setEditRating(this, {{ $i }})">
                            {{ $i <= $review->rating ? '★' : '☆' }}
                        </span>
                    @endfor
                </div>

                <input type="hidden" name="rating" id="editRating" value="{{ $review->rating }}">
            </div>

            <!-- REVIEW TEXT -->
            <div class="form-group">
                <label class="form-label">Your Review</label>

                <textarea name="review"
                          class="review-textarea"
                          required>{{ $review->review }}</textarea>
            </div>

            <!-- IMAGE -->
            <div class="form-group">
                <label class="form-label">Update Image (optional)</label>
                <input type="file" name="image">
            </div>

            @if($review->image)
                <div class="form-group image-preview">
                    <img src="{{ asset('storage/'.$review->image) }}"
                         class="review-image">
                </div>
            @endif

            <!-- ACTION BUTTONS -->
            <div class="edit-review-actions">
                <button class="action-btn">
                    Update Review
                </button>

                <a href="{{ url()->previous() }}"
                   class="action-btn secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>

<script>
function setEditRating(el, rating) {
    document.getElementById('editRating').value = rating;

    const stars = el.parentElement.querySelectorAll('span');
    stars.forEach((star, index) => {
        star.textContent = index < rating ? '★' : '☆';
    });
}
</script>

@endsection
