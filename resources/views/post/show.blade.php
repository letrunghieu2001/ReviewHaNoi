@extends('layouts.post.app')

@section('title')
{{ $post->title }}
@endsection

@section('content')
<form method="GET" action="{{ url('/search') }}">

<div class="noidung">
  <div class="b1">
      <h4 class="tieude">{!! $post->title !!}</h4>
      <span>{!! $post->content !!}</span>
      <img src="{{ asset('assets/img/images/baipost.png') }}" alt="1">
      <form class="cmt" action="" method="post">
          <textarea class="cmt1" name="comments" id="comments" placeholder="Bình Luận..." ></textarea>
          <input type="submit" value="Gửi Bình Luận">
      </form>
  </div>

</div>
<div class="carousel">
  <div class="slide-container">
      <div class="slide">
          <img src="{{ asset('assets/img/slides/food.jpg') }}" alt="quan-an">
          <span></span>
          <div class="text">Quán Ăn</div>
      </div>
      <div class="slide">
          <img src="../Image/slides/coffe.jpg" alt="coffe">
          <span></span>
          <div class="text">Cafe</div>
      </div>
      <div class="slide">
          <img src="../Image/slides/restaurant.jpg" alt="nha-hang">
          <span></span>
          <div class="text">Nhà Hàng</div>
      </div>
      <div class="slide">
          <img src="../Image/slides/check-in.jpg" alt="check-in">
          <span></span>
          <div class="text">Check In</div>
      </div>
      <div class="slide">
          <img src="../Image/slides/fastfood.jpg" alt="fastfood">
          <span></span>
          <div class="text">Fast Food</div>
      </div>
      <div class="slide">
          <img src="../Image/slides/vanmieu.jpg" alt="thangcanh">
          <span></span>
          <div class="text">Thắng Cảnh</div>
      </div>
      
  </div>

  <div class="btn-prev"><i class="fa-solid fa-angle-up"></i></div>
  <div class="btn-next"><i class="fa-solid fa-angle-down"></i></div>
</div>


@endsection
