<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'text' => $request->text,
        ]);

        return redirect()->back();
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back();
    }
}
