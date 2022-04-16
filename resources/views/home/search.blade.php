@extends('layouts.search.app')

@section('title')
Search
@endsection

@section('content')
<div class="box">
    <div class="wrapper">
        <ul class="catelogy">
            <li><a href="#">Nổi bật</a></li>
            <li><a href="#">Địa điểm check-in</a></li>
            <li><a href="#">Danh lam thắng cảnh</a></li>
            <li><a href="#">Cafe</a></li>
            <li><a href="#">Nhà hàng</a></li>
            <li><a href="#">Ăn vặt</a></li>
            <li id="tk">Bộ lọc nâng cao <i class="fa-solid fa-caret-down"></i></li>
        </ul>
    </div>
    
    <div class="articles">
        @foreach ($posts as $post)
        <a  href="{{ url("/posts/$post->post_id") }}"  class="art">
            <img src="../Image/Images/baipost.png" alt="">
            <div class="content">
                <h4 class="title">{{ $post->post_name}}</h4>
                <div>{{ $post->address }}</div>
                <div>{{ $post->category_name }}</div>
            </div>
         
        </a>
   @endforeach
        </div>

</div>

<div class="popuptk">
    <ul class="tk">
        <li class="column"><a href="#">Quận
            <ul class="subtk h1">
                <li><a href="#">Ba Đình</a></li>
                <li><a href="#">Bắc Từ Liêm</a></li>
                <li><a href="#">Cầu Giấy</a></li>
                <li><a href="#">Đống Đa</a></li>
                <li><a href="#">Hà Đông</a></li>
                <li><a href="#">Hai Bà Trưng</a></li>
                <li><a href="#">Hoàn Kiếm</a></li>
                <li><a href="#">Hoàng Mai</a></li>
                <li><a href="#">Long Biên</a></li>
                <li><a href="#">Nam Từ Liêm</a></li>
                <li><a href="#">Tây Hồ</a></li>
                <li><a href="#">Thanh Xuân</a></li>
            </ul>
        </a>
        </li>
        <li class="column"><a href="#">Địa Điểm
            <ul class="subtk h2">
                <li><a href="#">Nhà Hàng</a></li>
                <li><a href="#">Quán Ăn</a></li>
                <li><a href="#">Quán Ăn Vặt</a></li>
                <li><a href="#">Quán Cà Phê</a></li>
                <li><a href="#">Di Tích Lịch Sử</a></li>
                <li><a href="#">Địa Điểm - Check In</a></li>
                <li><a href="#">Homestay-Khách Sạn</a></li>
                
            </ul>
        </a></li>
        <a href="#" class="butontk">Tìm kiếm</a>
    </ul>
    


    <div class="nenden"></div>
</div>

@endsection 
