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
@php $ratenum = number_format($rating_count) @endphp
<div class="rating">
  @for($i = 1 ; $i <= $ratenum; $i++)
  <i class="fa fa-star checked"></i>
  @endfor
  @for($j = $ratenum+1 ; $j <= 5; $j++)
  <i class="fa fa-star"></i>
  @endfor
  <span>
    @if($rating->count() > 0)
    {{$rating->count()}} ratings
    @else
    No ratings
    @endif
  </span>
</div>        
<h4>Địa chỉ:{{ $post->post_address}}</h4>
        <h4>Số điện thoại:{{ $post->phone_number}}</h4>
        <h4>Giờ mở cửa: {{ $post->time}}</h4>
        <div class="flex">
          <div class="link">
            <a href='{{ $post->link}}' target="_blank">Xem trang web</a>
          </div>
          <div class="link">
            <a href='{{ $post->map}}' target="_blank">Bản đồ</a>
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
      @if (Auth::user()->role_id == 1)
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
      <!-- create comment -->
        @if (Auth::check())
       @if ($user_rating)

<div class="title" >
  <h3>Bạn đã đánh giá địa điểm này</h3>
</div>

       @else
<form action="{{ url("/add-rating/$post->post_id") }}" method="POST">
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
<input id="sent" class="button button-section" type="submit" value="Gửi đánh giá" onclick="if (confirm('Cảm ơn bạn đã đánh giá')) document.getElementById('sent').submit()">
</form>

@endif

@endif

      <!-- Tiêu đề phần bình luận -->
      <div class="related-post">
         <div class="title">
          <h3>Bình luận</h3>
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
                            <div class="word-break reponsive" id="show-cmt" >
                                <p>{!! $comment->content !!}</p>
                            </div>
                        </div>
                      </div>

                      <div class="right">
                      <div class="three__dots">
                        @if (Auth::check())
                        @if(($comment->user_id == Auth::user()->id))
                        <div class="ml-auto btn-group dropleft" id="a_post">
                            <a type="button" id="dropdownMenuComment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v tt-icon-btn text-dark"></i>
                            </a>
                            <ul class="dropdown-menu subMenu" aria-labelledby="dropdownMenuComment">
                                <!--Edit comment-->
                                <li>
                                  <a class="dropdown-item mt-3 text-black" href="{{ url("/comments/$comment->id/self_edit") }}">
                                    <span>Edit</span>
                                  </a>
                                </li>
                                
                                <!--Delete comment-->
                                <li>
                                  <a class="dropdown-item mt-3 mb-3" href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('comment-delete-{{ $comment->id }}').submit()">
                                    <span>Delete</span>
                                    <form action='{{ url("/comments/{$comment->id}") }}' method="POST" id="comment-delete-{{ $comment->id }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                  </a>
                                </li>
                            </ul>
                        </div>
                        @endif
                        @endif
                        </div>
                      </div>
                      



                    </div>

                </div>
                @endforeach                   
                 <div style="text-align:center ">
                    {{ $comments->links() }}
</div>
            </div>

        </div>


        
        @endif

@endsection
