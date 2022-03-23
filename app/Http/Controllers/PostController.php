<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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
            ->select('posts.id','places.name', 'places.address', 'places.time','categories.name AS category_name','posts.id as post_id' )
            ->get();

        $countPlace = DB::table('places')
        ->count();

        return view('post.index', [
            'places' => $places,
            'countPlace' => $countPlace
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



        $post = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->where('posts.id', '=', "$post")
        ->select('posts.*', 'users.name', 'users.avatar')
        ->get();

        $post = $post[0];
        
        
        return view('post.show',[
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

    public function store(PostRequest $request, Post $post)
    {
        $data = Post::create([
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'title' => $request->title
        ]);
        return redirect("/posts/{$post->id}");
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update([
            'content' => $request->content,
            'title' => $request->title
        ]);
        return redirect("/posts/{$post->id}");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        $id_user = Auth::user()->id;
        if($post->user_id == $id_user)
        {
            return view('post.edit', [
                'post' => $post
            ]);
        }
        else 
        {
            abort (401);
        }
    }
    
}
