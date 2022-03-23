@extends('layouts.info.app')

@section('title')
Giới thiệu
@endsection

@section('content')
<div class="top">
    <!-- // start menu -->
     <!-- Nav -->
     <nav class="main-nav">
        <div class="toggle-btn">
          <div></div>
        </div>
      </nav>


    <div class="nav">
        <ul class="row1">
            <li><a href="{{ url('info') }}">Giới thiệu</a></li>
            <li><a href="#">Liên Hệ</a></li>
            <li class="widtht"><a href="#">Chính sách bảo mật</a></li>
            <li><a href="#">Hỗ trợ</a></li>
            <li><img src="{{ asset('assets/img/home/menu/vn.png') }}" alt="Viet_Nam"></li>
        </ul>
        <ul class="row2">
            <div class="menu">
            <li><img id="logo" src="{{ asset('assets/img/home/menu/logo.png') }}" alt="logo"></li>
            <li><a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/home/menu/home.png') }}" alt="">
                <span>    Trang chủ</span>
                </a>
            </li>
            <li><a href="#">
                <img src="{{ asset('assets/img/home/menu/gift.png') }}" alt="">
                <span>Ưu đãi đặc biệt</span>
                </a>
            </li>
            <li><a href="{{ url('/posts') }}">
                <img src="{{ asset('assets/img/home/menu/category.png') }}" alt="">
                <span> Danh mục </span>
                </a>
            </li>
            </div>
            @if (Auth::check())
            <li class="admin">
            <a href="{{ url('/adminstration') }}">
              @if (Auth::user()->role_id == 1)  Admin  @endif
              @if (Auth::user()->role_id == 2) User @endif
            </a>
          </li>
          @endif
          @if (Auth::check())
          <li class="admin" style="display: table-cell;">
            <a class="nav-link dropdown-toggle" style="padding: 13px 15px;" data-toggle="dropdown" href="{{ url("") }}" role="button" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle img" width="20%" src="{{ asset("/uploads/avatars/".Auth::user()->avatar) }}">
              <span class="name"> {{ Auth::user()->name }} </span>
            </a>
            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
              <a class="dropdown-item" href="{{ url("/user/self_show") }} ">
                <i class="fa fa-user icon"></i> Profile </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('/logout')}}">
                <i class="fa fa-power-off icon"></i> Logout </a>
            </div>
          </li>
            @else
            <li class="admin">
                <a href="{{ url('login') }}">Đăng nhập</a>
            </li>
            @endif
        </ul>
    </div>
    <!-- // end menu -->
  <div class="container" id="info">
    <div class="info">
      <div class="info__logo">
        <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
      </div>
      <div class="info__content">
        <h3 class="title">Review Hà Nội là gì?</h3>
        <p>Được xây dựng từ giữa năm 2020 tại Hà Nội, Việt Nam, Review Hà Nội là cộng đồng tin cậy cho mọi người có thể tìm kiếm, đánh giá, bình luận các địa điểm ăn uống nhà hàng, quán ăn, cafe, tiệm bánh, khu du lịch tại Hà Nội - từ website hoặc ứng dụng di động. Tất cả thành viên từ Bắc đến Nam, Review Hà Nội kết nối những thực khách đến với các địa điểm ăn uống lớn nhỏ cả đất nước Việt Nam.</p>
      </div>
      <div class="split">
        <div class="info__content">
          <h3 class="title">Tìm kiếm đơn giản</h3>
          <p>Công cụ tìm kiếm thông minh bằng cách gõ tên địa điểm, hoặc địa chỉ, hoặc tên đường, hoặc tên món ăn, hoặc mục đích, hoặc tên khu vực. Hệ thống tìm kiếm sử dụng gợi ý & xem nhanh thông tin, giúp bạn tìm địa điểm nhanh nhất.</p>
        </div>
        <div class="info__content">
          <h3 class="title">Phân loại chi tiết</h3>
          <p>Review Hà Nội phân loại các địa điểm ra rất chi tiết, theo mục đích, loại hình, món ăn, giá cả, loại ẩm thực. Điều này giúp cộng đồng lọc địa điểm theo mục đích của mình rất nhanh chóng.</p>
        </div>
      </div>
      
      <div class="info__content">
        <h3 class="title">Bình luận và đánh giá</h3>
        <p>Review Hà Nội cho phép thành viên chèn hình ảnh vào bình luận, đánh giá địa điểm với 5 tiêu chí: 
          <br>+ Món ăn.
          <br>+ Vị trí.
          <br>+ Không gian.
          <br>+ Giá cả và Dịch vụ.
          <br>+ Ưu đãi.
          <br>Điều này giúp cộng đồng có cái nhìn tổng quát về các tiêu chí của mỗi địa điểm. 
          <br>Do đặc thù của mỗi địa điểm khác nhau, ví dụ Quán cafe, cộng đồng sẽ quan tâm đến không gian, đối với Quán ăn thì cộng đồng quan tâm đến chất lượng món. 
          <br>Đây chính là điểm khác biệt của Review Hà Nội so với các dịch vụ khác.
        </p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="container">
    <div class="footer__content">
        <div class="footer__logo">
          <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
          <h1>Bring Ha Noi to you!</h1>
        </div>
        <div class="footer__contact">
          <h3>Contact</h3>
          <h3>0123456789</h3>
          <h3>reviewhanoi@gmail.com</h3>
        </div>
        <div class="footer__socials">
          <h3>Follow us</h3>
          <div class="socials">
            <a href="#"><img src="{{ asset('assets/img/facebook.png') }}" alt="facebook"></a>
            <a href="#"><img src="{{ asset('assets/img/instagram.png') }}" alt="instagram"></a>
            <a href="#"><img src="{{ asset('assets/img/tik-tok.png') }}" alt="tiktok"></a>
          </div>
        </div>
    </div>
    <div class="footer__info">
      <h3>Copyright &copy; 2020-2021. All right reserved by <span>ReviewHanoi</span></h3>
      <a href="#"><i class="fa-solid fa-circle-arrow-up"></i></i></a>
    </div>
</footer>

@endsection   