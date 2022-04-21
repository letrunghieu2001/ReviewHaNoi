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
            'stars_rated' => $star_rated
        ]);

        return redirect("/posts/{$post}");
    }
}
