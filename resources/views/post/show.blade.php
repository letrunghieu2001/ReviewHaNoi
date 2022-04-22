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

  <div class="related-post">
    <div class="title">
      <h3>Những địa điểm gần đó</h3>
    </div>
    <div class="image-slider-2">
    @foreach($items as $item)
          @if(( $item->district_id == $post->district_id))
        <a href="{{ url("/posts/$item->id") }}" class="image-item">
          <div class="image">
            <img src="{{ asset("uploads/thumb/$item->thumbnail") }}" alt="">
          </div>
          <div class="image-title">
            <h3>{!! $item->name !!}</h3>
          </div>
        </a>
        @endif
    @endforeach
    </div>
  </div>
</div>



<div class="related-post">
  <div class="title">
    <h3>Những địa điểm liên quan</h3>
  </div>
  <div class="image-slider">
  @foreach($items as $item)
        @if(( $item->category_id == $post->cat_id))
      <a href="{{ url("/posts/$item->id") }}" class="image-item">
        <div class="image">
          <img src="{{ asset("uploads/thumb/$item->thumbnail") }}" alt="">
        </div>
        <div class="image-title">
          <h3>{!! $item->name !!}</h3>
        </div>

      </a>
        @endif
  @endforeach
  </div>

</div>



@if (Auth::check())
      @if ($post->role_id == 1)
<div class="button-section">
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
      @if (Auth::check())
<form action="{{ url("/add-rating") }}" method="POST">
@csrf
      <div class="rating-css">
    <div class="star-icon">
        <input type="radio" value="1" name="product_rating" checked id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="product_rating" id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="product_rating" id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="product_rating" id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="product_rating" id="rating5">
        <label for="rating5" class="fa fa-star"></label>
    </div>
</div>
<input id="sent" class="button" type="submit" value="Đánh giá">
</form>
@endif

      <!-- Tiêu đề phần bình luận -->
      <div class="related-post">
         <div class="title">
          <h3>Phần bình luận</h3>
        </div>    
      </div>
      <!-- create comment -->
        @if (Auth::check())
      <form class="cmt comment-section" action="{{ url("/comments/$post->post_id") }}" method="POST">
      @csrf
          <textarea class="cmt1" name="content" id="comments" placeholder="Bình Luận..." ></textarea>
          <div class="flex">
            <input id="discard" class="button" type="submit" value="Hủy">
            <input id="sent" class="button" type="submit" value="Gửi Bình Luận">
          </div>
          @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
      </form>
      @else
      <a class="comment-section" href="{{ url("login") }}">Vui lòng  Đăng nhập để bình luận </a>
        @endif
      
      @if ($countComment > 0)
      <h3 style="margin-left:10%">Có {{ $countComment }} bình luận</h3>
            <!-- Show comment -->
            <div class="tt-item card card-block comments comment-section">
                @foreach ($comments as $comment)
                <div class="comment-block">
                    <img class="rounded-circle img" width="40" src="{{ asset("/uploads/avatars/$comment->avatar") }}">
                    <div class="comment-content">

                      <div class="left">
                        <h4 class="pt-2">{{ $comment->name}}</h4>
                        <div class="row size_10px">{{ $comment->created_at }}</div>
                        <div class="mt-2 mr-4 row">
                            <div class="word-break reponsive">
                                {!! $comment->content !!}
                            </div>
                        </div>
                      </div>

                      <div class="right">
                      <div class="three-dots">
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
                      </div>
                      



                    </div>
                </div>
                @endforeach
            </div>

        </div>


        
        @endif

@endsection
