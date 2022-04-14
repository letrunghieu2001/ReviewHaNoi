<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PostRequest;
use App\Models\Place;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        
            //full posts
            $places = DB::table('places')
            ->join('districts', 'districts.id', '=', 'places.district_id')
            ->join('place_category_details', 'place_category_details.place_id', '=', 'places.id')
            ->join('posts', 'posts.place_id', '=', 'places.id')
            ->join('categories','categories.id','=','place_category_details.category_id')
            ->select('places.name', 'places.address', 'places.time','categories.name AS category_name','posts.id as post_id' )
            ->get();
            
        $countPlace = DB::table('places')
        ->count();

        return view('post.index', [
            'places' => $places,
            'countPlace' => $countPlace,
        ]);
    }

    public function show($post)
    {              
        $comments = DB::table('comments')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->where('comments.post_id', '=', "$post")
        ->select('comments.*', 'users.name',  'users.avatar')
        ->latest()
        ->paginate(10);  
        
        $countComment = DB::table('comments')
        ->where('comments.post_id', '=', "$post")
        ->count();

        $places = DB::table('places')
        ->join('place_category_details','place_category_details.place_id','=','places.id')
        ->join('posts','posts.place_id','=','places.id')
        ->select('places.*','place_category_details.category_id AS cate_id','posts.id AS post_id' )
        ->get();


        $post = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->join('post_category_details','post_category_details.post_id','=','posts.id')
        ->where('posts.id', '=', "$post")
        ->select('posts.*', 'users.*','post_category_details.category_id AS cat_id','posts.id AS id_post')
        ->get();

        $post = $post[0];


        
        
        return view('post.show',[
            'places' => $places,
            'comments' => $comments,
            'post' => $post,
            'countComment' => $countComment,
            
        ]);
    }

    public function create()
    {   
        return view('post.create', [
        ]);
    }

    public function store(PostRequest $postRequest, Post $post, PlaceRequest $placeRequest)
    {
        $data = Post::create([
            'user_id' => Auth::user()->id,
            'place_id' => $postRequest->place_id,
            'content' => $postRequest->content,
            'title' => $postRequest->title
        ]);
        $data1 = Place::create([
            'district_id' => $placeRequest->district_id,
            'name' => $placeRequest->name ,
            'address' => $placeRequest->address,
            'phone_number' => $placeRequest->phone_number,
            'link' => $placeRequest->link,
            'category_id' => $placeRequest->category_id,
            'time' => $placeRequest->time
        ]);
        return redirect("/posts/{$post->id}");
    }

    public function update(PostRequest $postRequest, Post $post, PlaceRequest $placeRequest)
    {
        $post->update([
            'content' => $postRequest->content,
            'title' => $postRequest->title,
            'name' => $placeRequest->name ,
            'address' => $placeRequest->address,
            'phone_number' => $placeRequest->phone_number,
            'link' => $placeRequest->link,
            'time' => $placeRequest->time
        ]);
        return redirect("/posts/{$post->id}");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

    public function edit(Post $post, Place $place)
    {
        $id_user = Auth::user()->role_id;
        if($id_user == 1)
        {
            return view('post.edit', [
                'post' => $post,
                'place' => $place
            ]);
        }
        else 
        {
            abort (401);
        }
    }
    
}
