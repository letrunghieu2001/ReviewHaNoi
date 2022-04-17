<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PostImageRequest;
use App\Http\Requests\PostRequest;
use App\Models\Place;
use App\Models\Post;
use App\Models\Post_image;
use App\Models\Post_thumb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        
            //full posts
            $posts = DB::table('posts')
            ->join('districts', 'districts.id', '=', 'posts.district_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->join('posts_thumb', 'posts_thumb.post_id', '=', 'posts.id')
            ->select('posts.*','posts_thumb.thumb','categories.name AS category_name','posts.name as post_name','posts.id as post_id')
            ->get();

        $countPost = DB::table('posts')
        ->count();

        return view('post.index', [
            'posts' => $posts,
            'countPost' => $countPost
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
        ->join('posts_image', 'posts_image.post_id', '=', 'posts.id')
        ->get();

        $post = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->join('districts', 'districts.id', '=', 'posts.district_id')
        ->join('categories', 'categories.id', '=', 'posts.category_id')       
        ->join('posts_image', 'posts_image.post_id', '=', 'posts.id')
        ->where('posts.id', '=', "$post")
        ->select('posts.*', 'users.*','districts.*','categories.*','categories.name AS category_name','posts.name as post_name','posts.category_id as cat_id','posts.id as post_id')
        ->get();

        $posts_image = DB::table('posts_image')
        ->get();


        $post = $post[0];
        
        return view('post.show',[
            'comments' => $comments,
            'post' => $post,
            'countComment' => $countComment,
            'items' => $items,
            'posts_image' => $posts_image
            
        ]);
    }

    public function create(Post_image $postImage)
    {   
        return view('post.create', [
            'postImage' => $postImage
        ]);
    }

    public function store(PostRequest $postRequest, Request $request)
    {
        $data = Post::create([
        'user_id' => Auth::user()->id,
        'district_id' => $postRequest->district_id,
        'name' => $postRequest->name,
        'address' => $postRequest->address,
        'phone_number' => $postRequest->phone_number,
        'link' => $postRequest->link,
        'category_id' => $postRequest->category_id,
        'time' => $postRequest->time,
        'content' => $postRequest->content,
        'title' => $postRequest->title
        ]);

        if($request->hasFile('post_thumb'))
        {
            $file = $request->file('post_thumb');
            $name = time().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save( public_path("/uploads/images/".$name));
            Post_thumb::create([
                'post_id' => $postRequest->id,
                'thumb' => $name
            ]);
        }

        if($request->hasFile('post_image'))
        {
            $file = $request->file('post_image');
            $name = time().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save( public_path("/uploads/images/".$name));
            Post_image::create([
                'post_id' => $postRequest->id,
                'image' => $name
            ]);
        }
        
        return redirect("/posts");
    }

    public function update(PostRequest $postRequest, Post $post )
    {
        $post->update([
            'user_id' => Auth::user()->id,
        'district_id' => $postRequest->district_id,
        'name' => $postRequest->name,
        'address' => $postRequest->address,
        'phone_number' => $postRequest->phone_number,
        'link' => $postRequest->link,
        'category_id' => $postRequest->category_id,
        'time' => $postRequest->time,
        'content' => $postRequest->content,
        'title' => $postRequest->title
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
    public function upload_image(Request $request, Post_image $postImage)
    {

        
        return redirect('/posts/create');
    
}
}
