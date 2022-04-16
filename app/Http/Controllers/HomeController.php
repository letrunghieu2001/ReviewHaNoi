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
                $posts = DB::table('posts')
            ->join('districts', 'districts.id', '=', 'posts.district_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*','districts.*','categories.*','categories.*','categories.name AS category_name','posts.name as post_name','posts.category_id as cat_id','posts.id as post_id')
            ->get();
                return view('post.index', [      
                    'posts' => $posts,
                ]);
            }
            $posts = DB::table('posts')
            ->join('districts', 'districts.id', '=', 'posts.district_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*','districts.*','categories.*','categories.name AS category_name','posts.name as post_name','posts.category_id as cat_id','posts.id as post_id')
            ->where('posts.name', 'LIKE', "%".$search."%")
            ->where('districts.name', 'LIKE', "%".$browser."%")
            ->where('posts.category_id', 'LIKE', "%".$type."%")
            ->distinct()
            ->paginate(10);
            return view('home.search', [
                'posts' => $posts,
            ]);
    }

    
    $posts = DB::table('posts')
    
    ->get();

    return view('home.search', [
        'posts' => $posts,
    ]);
}

public function store(Request $request){
    return $request->all();
    return view('home.search');
}
}
