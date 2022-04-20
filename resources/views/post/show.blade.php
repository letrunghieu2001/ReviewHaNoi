@extends('layouts.post_show.app')

@section('title')
{{ $post->title }}
@endsection

@section('content')

<!-- start post -->
<div class="panel">

<div id="posts">
  <div id="heading">
    <div class="title">
      <h3>{!! $post->title !!}</h3>
    </div>
    <div class="contact">
      <h4>Địa chỉ:{{ $post->address}}</h4>
      <h4>Số điện thoại:{{ $post->phone_number}}</h4>
      <h4>Giờ mở cửa: {{ $post->time}}</h4>
      <div class="flex">
        <div class="link">
          <a href='{{ $post->link}}'>Xem trang web</a>
        </div>
        <div class="link">
          <a href='{{ $post->map}}'>Bản đồ</a>
        </div>
      </div>
     
    </div>
    <div class="author">
      <img src="{{ asset("assets/img/id.png") }}" alt="">
      <h3 class="name"> Written by {{$post->arthur_name}}</h3>      
    </div>
  </div>
  <div class="break">
    <img src="{{ asset("assets/img/line.png") }}" alt="line">
  </div>
  <div class="main-content">
    <div class="picture">
      <img src="{{ asset("uploads/post/$post->image") }}" alt="">
      <!-- <img src="../Image/food/banhmi.jpg" alt="">
      <img src="../Image/food/comrang.jpg" alt=""> -->
    </div>
    <div class="content">
      <p>{!! $post->content !!}
      </p>
      <p>{{$post->arthur_name}} {{$post->created_at}}</p>
    </div>
  </div>
</div>
</div>

<!-- end post -->

<!-- star slide -->
<div class="carousel">
  <h3>Các địa điểm gần đó</h3>
  <div class="slide-container">
    @foreach($items as $item)
      @if(( $item->district_id == $post->district_id))
  <div class="slide">
  <a  href="{{ url("/posts/$item->id") }}"  class="art">
          <img src="{{ asset("uploads/thumb/$item->thumbnail") }}" alt="quan-an">
          <span></span>
          <div class="text">{!! $item->name !!}</div>
  </a>
      </div>
@endif
@endforeach
</div>
  <div class="btn-prev"><i class="fa-solid fa-angle-up"></i></div>
  <div class="btn-next"><i class="fa-solid fa-angle-down"></i></div>
</div>

<!-- end slide -->


<div class="related-post">
<div class="title">
  <h3>Những địa điểm liên quan</h3>
</div>

@foreach($items as $item)
      @if(( $item->category_id == $post->cat_id))
<div class="related-content">
  <a href="{{ url("/posts/$item->id") }}"" class="el">
    <img src="{{ asset("uploads/thumb/$item->thumbnail") }}" alt="">
    <h3>{!! $item->name !!}</h3>
  </a>

</div>  
@endif
@endforeach
</div>

@if (Auth::check())
      @if ($post->role_id == 1)
      <div class="flex">
          <div class="button">
          
      <a href="{{ url("/posts/$post->post_id/edit") }}"  >
          <span>Sửa bài viết</span>
  </a>
      </div>
      <div class="button">
  <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa bài viêt không?')) document.getElementById('post-delete-{{ $post->id }}').submit()" class="tt-icon-btn">
  <span>Xóa bài viết</span>
                        <form action="{{ url("/posts/$post->post_id") }}" method="POST" id="post-delete-{{$post->id }}">
                            @method('DELETE')
                            @csrf
                        </form>
                    </a>
      </div>  
      </div>
    
  @endif
  @endif
      </div>

      <!-- create comment -->
        @if (Auth::check())
      <form class="cmt" action="{{ url("/comments/$post->post_id") }}" method="POST">
      @csrf
          <textarea class="cmt1" name="content" id="comments" placeholder="Bình Luận..." ></textarea>
          <input type="submit" value="Gửi Bình Luận">
          @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
      </form>
      @else
      <a href="{{ url("login") }}">Vui lòng  Đăng nhập để bình luận </a>
        @endif
      
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
                            <h6 class="pt-2">{{ $comment->name}}</h6>

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
            </div>

        </div>



        @else
        <p>Không có comment</p>
        @endif


@endsection
