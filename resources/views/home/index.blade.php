@extends('layouts.home.app')

@section('title')
ReviewHaNoi
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
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Liên Hệ</a></li>
            <li class="widtht"><a href="#">Chính sách bảo mật</a></li>
            <li><a href="#">Hỗ trợ</a></li>
            <li><img src="{{ asset('assets/img/home/menu/vn.png') }}" alt="Viet_Nam"></li>
        </ul>
        <ul class="row2">
            <div class="menu">
            <li><img id="logo" src="{{ asset('assets/img/home/menu/logo.png') }}" alt="logo"></li>
            <li><a href="#">
                <img src="{{ asset('assets/img/home/menu/home.png') }}" alt="">
                <span>    Trang chủ</span>
                </a>
            </li>
            <li><a href="#">
                <img src="{{ asset('assets/img/home/menu/gift.png') }}" alt="">
                <span>Ưu đãi đặc biệt</span>
                </a>
            </li>
            <li><a href="#">
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
              <a class="dropdown-item" href="{{ url("/users/self_show") }} ">
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
    <div class="body">
        <div class="logo_title">
            <img src="{{ asset('assets/img/home/menu/logo.png') }}" alt="">
            <h4>Mang cả Hà Nội đến với bạn</h4>
        </div>
        <div class="wrap">
             <div class="search">
                <input class="danhmuc" list="browsers" name="browser" id="browser" placeholder="Địa điểm">
                <datalist id="browsers">
                      <option value="Hồ Gươm">
                      <option value="Hồ Tây">
                      <option value="Cầu Giấy">
                      <option value="Thanh Trì">
                      <option value="Thường Tín">
                </datalist>
               <input type="text" class="searchTerm" placeholder="Điểm du lịch, quán ăn, khách sạn...">
               <button type="submit" class="searchButton">
                 <i class="fa fa-search"></i>
              </button>
            </div>
         </div>
    </div>
    <div class="bg"><img src="{{ asset('assets/img/home/menu/bg.png') }}" alt=""></div>
</div>




@endsection    <!-- <p>Hello  dang nhap thanh cong. Day la trang chu</p>
        <a class="dropdown-item" href="{{ url("/users/self_show") }} "> 
            <i class="fa fa-user icon"></i> Xem thông tin cá nhân </a>
    
        <a class="dropdown-item" href="{{ url("/users/edit") }} "> 
            <i class="fa fa-user icon"></i> Thay đổi thông tin người dùng </a>
    
    <a class="dropdown-item" href="{{url('/logout')}}">
                                        <i class="fa fa-power-off icon"></i> Logout </a> -->