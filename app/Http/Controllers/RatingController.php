<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request, $post)
    {   
        $star_rated = $request->input('product_rating');

        Rating::create([
            'post_id' => $post,
            'user_id' => Auth::user()->id,
            'rating' => $star_rated
        ]);

        return redirect()->back()->with('status','Cảm ơn bạn đã đánh giá địa điểm này');
    }
}
