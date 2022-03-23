<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
      //
public function store(CommentRequest $request, $post)
{       
    $data = Comment::create([
        'post_id' => $post,
        'user_id' => FacadesAuth::user()->id,
        'content' => $request->content
    ]);
    return redirect("/posts/{$post}");
}

public function self_edit(Comment $comment)
{
    $user_id = FacadesAuth::user()->id;
    if($comment->user_id == $user_id)
    {
        return view('comment.edit', [
        'comment' => $comment
    ]);
    }
    else 
    {
        abort (401);
    }
}

public function update(CommentRequest $request, Comment $comment)
{
    $comment->update([
        'content' => $request->content
    ]);
    return redirect("/posts/{$comment->post_id}");
}

public function destroy(Comment $comment)
{
    $user_id = FacadesAuth::user()->id;
    if($comment->user_id == $user_id)
    {
        $comment->delete();
        return redirect("/posts/{$comment->post_id}");
    }
    else 
    {
        abort (401);
    }
}
}
