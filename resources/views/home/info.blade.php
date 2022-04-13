@extends('layouts.home.app')

@section('title')
Giới thiệu
@endsection

@section('content')

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
  
@endsection   