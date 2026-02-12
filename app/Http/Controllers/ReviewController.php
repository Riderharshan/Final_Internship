<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /** Store new review */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'order_id'   => 'required|exists:orders,id',
            'rating'     => 'required|integer|min:1|max:5',
            'review'     => 'required|string|max:2000',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                                 ->store('reviews', 'public');
        }

        Review::create([
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
            'order_id'   => $request->order_id,
            'rating'     => $request->rating,
            'review'     => $request->review,
            'image'      => $imagePath,
        ]);

        return redirect()
        ->back()
        ->with('review_success', 'Review submitted successfully');
    }

    /** Edit review page */
    public function edit(Review $review)
    {
        $this->authorizeReview($review);

        return view('edit', compact('review'));
    }

    /** Update review */
    public function update(Request $request, Review $review)
    {
        $this->authorizeReview($review);

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:2000',
            'image'  => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($review->image) {
                Storage::disk('public')->delete($review->image);
            }

            $review->image = $request->file('image')
                                     ->store('reviews', 'public');
        }

        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        return redirect('/my-orders')->with('success', 'Review updated');
    }

    /** Delete review */
    public function destroy(Review $review)
    {
        $this->authorizeReview($review);

        if ($review->image) {
            Storage::disk('public')->delete($review->image);
        }

        $review->delete();

        return back()->with('success', 'Review deleted');
    }

    /** Authorization check */
    private function authorizeReview(Review $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
