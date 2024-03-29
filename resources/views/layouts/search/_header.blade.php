<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}">
     <!-- Font Awesome -->
   <script src="https://kit.fontawesome.com/123967a163.js" crossorigin="anonymous"></script>
   <!-- Box Icon -->
   <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
   <!-- CSS -->
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
   <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
   <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
   <link rel="stylesheet" href="{{ asset('css/search.css') }}">
   <!-- <link rel="stylesheet" href="../CSS/home.css"> -->
   

   
  <title>@yield('title')</title>
</head>
<body>
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
            <li><a href="{{ url('contact') }}">Liên Hệ</a></li>
            <li class="widtht"><a href="{{ url('privacy') }}">Chính sách bảo mật</a></li>
            <li><a href="{{ url('support') }}">Hỗ trợ</a></li>
            <li><img src="{{ asset('assets/img/menu/vn.png') }}" alt="Viet_Nam"></li>
        </ul>
        <ul class="row2">
            <div class="menu">
              <li><img id="logo" src="{{ asset('assets/img/logo.png') }}" alt="logo"></li>
              <li><a href="{{ url('/') }}">
                  <img src="{{ asset('assets/img/home/menu/home.png') }}" alt="">
                  <span>    Trang chủ</span>
                  </a>
              </li>
              <li id="gift"><a href="#">
                  <img src="{{ asset('assets/img/home/menu/gift.png') }}" alt="">
                  <span>Ưu đãi đặc biệt</span>
                  </a>
                  <ul class="menu2" >
                    <li><a href="javascript:void(0)" onclick="if (confirm('Mã giảm giá của bạn là: VuiThang4Giam50%')) document.getElementById('').submit()">Giảm Giá 50%</a></li>
                    <li><a href="javascript:void(0)" onclick="if (confirm('Mã giảm giá của bạn là: ReviewHaNoiSieuUuDai')) document.getElementById('').submit()">Ưu Đãi Đối Tác</a></li>
                    <li><a href="javascript:void(0)" onclick="if (confirm('Mã giảm giá của bạn là: FreeShipThang4')) document.getElementById('').submit()">Freeship</a></li>
                    <li><a href="javascript:void(0)" onclick="if (confirm('Mã giảm giá của bạn là: KhongLamMaDoiCoAn')) document.getElementById('').submit()">Deal 0đ</a></li>
                  </ul>
              </li>
              <li id="category"><a href="{{ url('/posts') }}">
                  <img src="{{ asset('assets/img/home/menu/category.png') }}" alt="">
                  <span> Danh mục </span>
                  </a>
                  <ul class="menu2" >
                  <li><a href="{{ url('posts?type=Nhà+hàng&browser=&search=') }}">Nhà Hàng</a></li>
                    <li><a href="{{ url('posts?type=Quán+ăn&browser=&search=') }}">Quán Ăn</a></li>
                    <li><a href="{{ url('posts?type=Ăn+vặt&browser=&search=') }}">Ăn Vặt</a></li>
                    <li><a href="{{ url('posts?type=Quán+cà+phê&browser=&search=') }}">Quán Cà Phê</a></li>
                    <li><a href="{{ url('posts?type=Di+tích+lịch+sử&browser=&search=') }}">Di tích Lịch Sử</a></li>
                    <li><a href="{{ url('posts?type=Địa+điểm+check-in&browser=&search=') }}">Địa điểm Check-in</a></li>
                    <li><a href="{{ url('posts?type=Homestay+-+Khách+sạn&browser=&search=') }}">Homestay - Khách sạn</a></li>
                  </ul>
              </li>
              <li id="map">
                <a href="{{ url('/map') }}">
                  <img src="{{ asset('assets/img/map.png') }}" alt="">
                  <span>Bản đồ Review</span>
                </a>
              </li>
              <li id="shop">
                <a href="https://shopeefood.vn/ha-noi/food">
                  <img src="{{ asset('assets/img/shopping-cart.png') }}" alt="">
                  <span>Shop</span>
                </a>
              </li>
            </div>
            @if (Auth::check())
            <li class="admin">
            <a href="">
              @if (Auth::user()->role_id == 1)  {{ Auth::user()->name }}  @endif
              @if (Auth::user()->role_id == 2) {{ Auth::user()->name }} @endif
            </a>
          </li>
          @endif
          @if (Auth::check())
            <li class="admin">
            <img class="rounded-circle img" width="20%" src="{{ asset("/uploads/avatars/".Auth::user()->avatar) }}">
              
                <ul class="menu2" >
                  <li><a href="{{ url("/user/self_show") }}">Thông tin cá nhân</a></li>
                  @if (Auth::user()->role_id == 1)
                  <li><a href="{{ url("/user/show") }}">Quản lý người dùng</a></li>
                  <li><a href="{{ url('/posts/create') }}">Đăng bài</a></li>
                  @endif
                  <li><a href="{{url('/logout')}}">Đăng xuất</a></li>
                </ul>
            </li>

            
            @else
            <li class="admin">  
            <a href="{{url('/login')}}">Đăng nhập</a>
            </li>
            @endif            

        </ul>
    </div>
  </div>
    <!-- // end menu -->