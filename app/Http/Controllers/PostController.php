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
            $posts = DB::table('posts')
            ->join('districts', 'districts.id', '=', 'posts.district_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*','categories.name AS category_name','posts.name as post_name','posts.id as post_id')
            ->get();
            
        $countPost = DB::table('posts')
        ->count();

        return view('post.index', [
            'posts' => $posts,
            'countPost' => $countPost,
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

        $items = DB::table('posts')
        ->get();

        $post = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->join('districts', 'districts.id', '=', 'posts.district_id')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->where('posts.id', '=', "$post")
        ->select('posts.*', 'users.*','districts.*','categories.*','categories.name AS category_name','posts.name as post_name','posts.category_id as cat_id','posts.id as post_id')
        ->get();

        $post = $post[0];
        return view('post.show',[
            'comments' => $comments,
            'post' => $post,
            'countComment' => $countComment,
            'items' => $items
            
        ]);
    }

    public function create()
    {   
        return view('post.create', [
        ]);
    }

    public function store(PostRequest $request)
    {
        $data = Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => 1,
            'district_id' => 1,
            'content' => $request->content,
            'title' => $request->title
        ]);
        
        return redirect("/posts");
    }

    public function update(PostRequest $request, Post $post )
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

        if( Auth::user()->role_id == 1)
        {
            return view('post.edit', [
                'post' => $post,
            ]);
        }
        else 
        {
            abort (401);
        }
    }
    
}
