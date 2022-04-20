@extends('layouts.home.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')

<div class="container" id="map">
    <div class="info">
        <div class="info__logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
        </div>
        <div class="map__content">
            <h1>Chào mừng đến với ReviewHanoi MiniMap</h1>
            <p>Hà Nội là một mảnh đất tuyệt vời để bạn khám phá vẻ đẹp không gian - con người và cả những món ăn ngon. Thế nhưng lựa chọn địa điểm ăn uống là một trong những công việc rất tốn thòi gian và công sức cho bất cứ một "thánh ăn" nào. Vậy nếu bạn là khách du lịch mới tới các tỉnh thành ở Việt Nam
                hoặc thậm chí bạn là người đang sinh sống và làm việc tại Hà Nọi, tại sao không để chúng mình giúp bạn tìm địa điểm ăn ngon ĐÃ ĐƯỢC CHỨNG THỰC ở gần bạn nhất? Cùng kéo bản đồ và theo chân chúng mình nhé!</p>
            <p>Nếu có bất kì vấn đề gì thắc mắc, hãy liên hệ với chúng mình qua phần thông tin liên hệ phía cuối website.</p>
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1AprEfTmdIugMsy4aMyYvgnm7-hL56tc6&ehbc=2E312F" width="640" height="480"></iframe>
            <div class="note">
                <h3>Một vài chú thích trong bản đồ:</h3>
                <p>
                    Màu xanh:   Nhà hàng <br>
                    Màu hồng:   Quán ăn đường phố <br>
                    Màu nâu:    Quán cà phê <br>
                    Màu tím:    Khách sạn - Hotel <br>
                    Màu xám:    Danh lam thắng cảnh <br>
                </p>
            </div>    
        </div>
    </div>


@endsection