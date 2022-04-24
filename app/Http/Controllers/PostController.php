<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PostImageRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        if((isset($_GET['search'])) && (isset($_GET['browser'])) && (isset($_GET['type'])))
        {
            $browser = $_GET['browser'];
            $search = $_GET['search'];
            $type = $_GET['type'];
            if (($browser == "") && ($type == "") && ($search == "") )
            {
                return redirect("/posts");
            }
            else
            {
            $posts = DB::table('posts')
            ->join('districts', 'districts.id', '=', 'posts.district_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*','districts.*','categories.*','categories.name AS category_name','posts.name as post_name','posts.category_id as cat_id','posts.id as post_id')
            ->where('posts.name', 'LIKE', "%".$search."%")
            ->where('districts.name', 'LIKE', "%".$browser."%")
            ->where('categories.name', 'LIKE', "%".$type."%")
            ->paginate(12);

            $posts->appends(['type' => $type, 'browser' => $browser,'search' => $search]);


            $countPost = DB::table('posts')
            ->join('districts', 'districts.id', '=', 'posts.district_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*','districts.*','categories.*','categories.name AS category_name','posts.name as post_name','posts.category_id as cat_id','posts.id as post_id')
            ->where('posts.name', 'LIKE', "%".$search."%")
            ->where('districts.name', 'LIKE', "%".$browser."%")
            ->where('categories.name', 'LIKE', "%".$type."%")
            ->count();
            return view('post.index', [
                'posts' => $posts,
                'countPost' => $countPost,
            ]);
        }
    }

            //full posts
            $posts = DB::table('posts')
            ->join('districts', 'districts.id', '=', 'posts.district_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*','categories.name AS category_name','posts.name as post_name','posts.id as post_id')
           ->paginate(12);
           


        $countPost = DB::table('posts')
        ->count();

        return view('post.index', [
            'posts' => $posts,
            'countPost' => $countPost


        ]);
    }

    public function show($post)
    {            
        $rating = DB::table('ratings')
        ->where('ratings.post_id', '=', "$post")
        ->select('ratings.*','ratings.user_id as userid')
        ->get();

        $user_rating = DB::table('ratings')
        ->where('ratings.post_id', '=', "$post")
        ->where('user_id','=',Auth::id())
        ->first();

        $rating_sum = DB::table('ratings')->where('ratings.post_id', '=', "$post")->sum('stars_rated');
        
        if($rating_sum > 0)
        {
            $rating_count = $rating_sum/$rating->count();
        }
        else
        { 
        $rating_count = 0;
        }

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
        ->select('posts.*', 'users.*','users.name AS arthur_name','districts.*','categories.*','categories.name AS category_name','posts.name as post_name','posts.category_id as cat_id','posts.id as post_id','posts.address AS post_address','posts.created_at AS post_created_at')
        ->get();


        $post = $post[0];
        
        return view('post.show',[
            'comments' => $comments,
            'post' => $post,
            'countComment' => $countComment,
            'items' => $items,
            'rating_count' => $rating_count,
            'rating' => $rating,
            'user_rating' => $user_rating
            
        ]);
    }

    public function create()
    {   
        return view('post.create', [

        ]);
    }

    public function store(PostRequest $postRequest)
    {
        $validate = $postRequest->validate([
            'image' => 'required'
        ]);
        if($postRequest->hasFile('thumbnail'))
        {
            $file1 = $postRequest->file('thumbnail');
            $name1 = time().".".$file1->getClientOriginalExtension();
            Image::make($file1)->save( public_path("/uploads/thumb/".$name1));
        }
        if($postRequest->hasFile('image'))
        {
            $file = $postRequest->file('image');
            $name = time().".".$file->getClientOriginalExtension();
            Image::make($file)->save( public_path("/uploads/post/".$name));
        }
        $data = Post::create([
        'user_id' => Auth::user()->id,
        'district_id' => $postRequest->district_id,
        'name' => $postRequest->name,
        'address' => $postRequest->address,
        'phone_number' => $postRequest->phone_number,
        'link' => $postRequest->link,
        'category_id' => $postRequest->category_id,
        'time' => $postRequest->time,
        'map' => $postRequest->map,
        'content' => $postRequest->content,
        'title' => $postRequest->title,
        'thumbnail' => $name1,
        'image' => $name
        ]);
        return redirect("/posts");
    }

    public function update(PostRequest $postRequest, Post $post )
    {
        if(($postRequest->hasFile('thumbnail')) || ($postRequest->hasFile('image')))
        {
            $file1 = $postRequest->file('thumbnail');
            $name1 = time().".".$file1->getClientOriginalExtension();
            Image::make($file1)->save( public_path("/uploads/thumb/".$name1));
            $file = $postRequest->file('image');
            $name = time().".".$file->getClientOriginalExtension();
            Image::make($file)->save( public_path("/uploads/post/".$name));
        $post->update([
        'user_id' => Auth::user()->id,
        'district_id' => $postRequest->district_id,
        'name' => $postRequest->name,
        'address' => $postRequest->address,
        'phone_number' => $postRequest->phone_number,
        'link' => $postRequest->link,
        'map' => $postRequest->map,
        'category_id' => $postRequest->category_id,
        'time' => $postRequest->time,
        'content' => $postRequest->content,
        'title' => $postRequest->title,
        'thumbnail' => $name1,
        'image' => $name
        ]);
    }
        else $post->update($postRequest->input());
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
