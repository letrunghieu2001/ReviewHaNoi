@extends('layouts.home.app')

@section('title')
{{ $post->title }}
@endsection

@section('content')

<main id="tt-pageContent" class="bg-main mt-3">
    <div class="container">
        <div class="tt-single-topic-list">
 
            <!--Show post-->
            <div class="tt-item card card-block">
                <div class="tt-single-topic">
                    <div class="tt-item-header">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <img class="rounded-circle img" width="50" src="{{ asset("/uploads/avatars/$post->avatar") }}">
                            </div>
                            <div class="tt-avatar-title">
                                {{ $post->name }}
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg>
                                        <use xlink:href="#icon-time"></use>
                                    </svg></i>{{ $post->created_at }}
                            </a>
                        </div>
                        <div class="reponsive">
                            {!! $post->title !!}
                        </div>
                    </div>
                    <div class="tt-item-description reponsive table-responsive">
                        {!! $post->content !!}
                    </div>
                </div>

                @if (Auth::check())
                <div class="row justify-content-space-evenly" id="a_post">

                    <!-- create Comment -->
                    <a href="#reply" class="tt-icon-btn">               
                        <span class="reply">({{ $countComment }})</span>
                    </a>
                   
                    <!-- Edit post -->
                    @if ($post->user_id == Auth::user()->id )
                    <a href="{{ url("/posts/$post->id/edit") }}" class="tt-icon-btn">
                        <p>Edit Post</p>
                    </a>
                    @endif

                    <!-- Delete post -->
                    @if (($post->user_id == Auth::user()->id) || (Auth::user()->role_id == 1) )
                    <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('post-delete-{{ $post->id }}').submit()" class="tt-icon-btn">
                        <p>Delete Post</p>
                        <form action='{{ url("/posts/$post->id") }}' method="POST" id="post-delete-{{$post->id }}">
                            @method('DELETE')
                            @csrf
                        </form>
                    </a>
                    @endif

                    
                </div>
                @endif
            </div>

            @if ($countComment > 0)
            <!-- Show comment -->
            <div class="tt-item card card-block">
                @foreach ($comments as $comment)
                <div class="media mt-3 ml-lg-4">
                    <span class="round pt-2 ml-lg-5">
                        <img class="rounded-circle img" width="40" src="{{ asset("/uploads/avatars/$comment->avatar") }}">
                    </span>
                    <div class="media-body ml_30px">
                        <div class="row mr-4">
                            <h6 class="pt-2">{{ $comment->name }}</h6>

                            @if (Auth::check())
                            @if(($comment->user_id == Auth::user()->id))
                            <div class="ml-auto btn-group dropleft" id="a_post">
                                <a type="button" id="dropdownMenuComment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v tt-icon-btn text-dark"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuComment">
                                    <!--Edit comment-->
                                    <a class="dropdown-item mt-3 text-black" href="{{ url("/comments/$comment->id/self_edit") }}">
                                        <img src="{{ asset('assets/img/forum/edit (1).png') }}" class="icon_post tt-icon-btn">
                                        <span>Edit comment</span>
                                    </a>

                                    <!--Delete comment-->
                                    <a class="dropdown-item mt-3 mb-3" href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('comment-delete-{{ $comment->id }}').submit()">
                                        <img src="{{ asset('assets/img/forum/delete (1).png') }}" class="icon_post tt-icon-btn">
                                        <span>Delete comment</span>
                                        <form action='{{ url("/comments/{$comment->id}") }}' method="POST" id="comment-delete-{{ $comment->id }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>

                        <div class="row size_10px">{{ $comment->created_at }}</div>

                        <div class="mt-2 mr-4 row">
                            <div class="word-break reponsive">
                                {!! $comment->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="mb-2 mt-5">
                    <div class="d-flex justify-content-center row">
                            {{ $comments->links() }}
                    </div>
                </div>
            </div>

        </div>

        <div class="tt-wrapper-inner">
            <h4 class="tt-title-separator"><span>End the comments of this post</span></h4>
        </div>
        @endif



        <!-- create comment -->
        @if (Auth::check())
        <form method="POST" action="{{ url("/comments/{$post->id}") }}">
            @csrf
            <div class="pt-editor form-default" id="reply">
                <h5 class="pt-title reply">Post Your Reply</h5>

                <div class="form-group">
                    <input type="text" name="content" value="{{ old('content') }}">
                    
                </input>
                @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row form-group">
                    <div class="col-auto ml-md-auto">
                        <button class="btn btn-primary btn-width-lg" type="submit">Reply</button>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>       
    @if ($countComment == 0)
        <p> Khong co comment nao </p>
        @endif
</main>

@endsection