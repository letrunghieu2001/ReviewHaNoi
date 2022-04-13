<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function info ()
    {
        return view('home.info');
    }

    public function search() 
    {
        if((isset($_GET['search'])) && (isset($_GET['browser'])) && (isset($_GET['type'])))
        {
            $browser = $_GET['browser'];
            $search = $_GET['search'];
            $type = $_GET['type'];
            if (($browser == "") && ($type == "") && ($search == "") )
            {
                $places = DB::table('places')
            ->join('districts', 'districts.id', '=', 'places.district_id')
            ->join('place_category_details', 'place_category_details.place_id', '=', 'places.id')
            ->join('posts', 'posts.place_id', '=', 'places.id')
            ->join('categories','categories.id','=','place_category_details.category_id')
            ->select('posts.id','places.name', 'places.address', 'places.time','categories.name AS category_name','posts.id as post_id' )
            ->get();
                return view('post.index', [      
                    'places' => $places,
                ]);
            }
            $places = DB::table('places')
            ->join('districts', 'districts.id', '=', 'places.district_id')
            ->join('place_category_details', 'place_category_details.place_id', '=', 'places.id')
            ->join('posts', 'posts.place_id', '=', 'places.id')
            ->join('categories','categories.id','=','place_category_details.category_id')
            ->select('posts.id','places.name', 'places.address', 'places.time','categories.name AS category_name','posts.id as post_id' )
            ->where('places.name', 'LIKE', "%".$search."%")
            ->where('districts.name', 'LIKE', "%".$browser."%")
            ->where('places.category_id', 'LIKE', "%".$type."%")
            ->distinct()
            ->paginate(10);
            return view('home.search', [
                'places' => $places,
            ]);
    }

    
    $places = DB::table('places')
    
    ->get();

    return view('home.search', [
        'places' => $places,
    ]);
}

public function store(Request $request){
    return $request->all();
    return view('home.search');
}
}
