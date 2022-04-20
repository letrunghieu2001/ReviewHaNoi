@extends('layouts.search.app')

@section('title')
Full Post
@endsection

@section('content')

<div class="body">
<div class="box">

<form method="GET" action="{{ url('/search') }}">
        <div class="wrap">
             <div class="search">
             <select class="danhmuc" id="type" name="type">
                      <option value="">Tất cả</option>
                      <option > Nhà hàng</option>
                      <option > Quán ăn</option>
                      <option > Ăn vặt</option>
                      <option > Quán cà phê</option>
                      <option > Di tích lịch sử</option>
                      <option > Địa điểm check-in</option>
                      <option > Homestay - Khách sạn</option>
                </select>
                <select class="danhmuc" id="browsers" name="browser">
                      <option value="">Tất cả</option>
                      <option> Quận Ba Đình</option>
                      <option> Quận Cầu Giấy</option>
                      <option> Quận Đống Đa</option>
                      <option> Quận Tây Hồ</option>
                      <option> Quận Bắc Từ Liêm</option>
                      <option> Quận Nam Từ Liêm</option>
                      <option> Quận Hoàn Kiếm</option>
                      <option> Quận Hoàng Mai</option>
                      <option> Quận Long Biên</option>
                      <option> Quận Thanh Xuân</option>
                      <option> Quận Hà Đông</option>
                      <option> Quận Hai Bà Trưng</option>
                </select>
               <input type="text" class="searchTerm" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];} ?>" placeholder="Điểm du lịch, quán ăn, khách sạn...">
               <button type="submit" class="searchButton">
                 <i class="fa fa-search"></i>
              </button>
            </div>
         </div>
</form>
    
    <div class="articles">
       
        @foreach ($posts as $post)
        <a  href="{{ url("/posts/$post->post_id") }}"  class="art"> 

            <img src="{{ asset("uploads/thumb/$post->thumbnail") }}" alt="">

            <div class="content">
                <h4 class="title">{{ $post->post_name }}</h4>
                <div>{{ $post->address }}</div>
                <div>{{ $post->category_name }}</div>
                <div>{{ $post->time }}</div>
            </div>
        </a>

@endforeach

<div class="mb-2 mt-5">
                    <div class="d-flex justify-content-center row">
                            
                    </div>
 </div>
   
        </div>

</div>

</div>

@endsection 