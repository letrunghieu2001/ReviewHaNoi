@extends('layouts.home.app')

@section('title')
Liên hệ
@endsection

@section('content')

<div id="contact">
        
        <div class="ctLogo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
        </div>
        <div class="text">
            <h3>Liên hệ</h3>
            <p>Nếu bạn có bất cứ thắc mắc hay muốn liên hệ với chung tôi! Hãy hoàn thành form phía dưới và đội ngũ của Review Hà Nội team sẽ trả lời những thắc mắc của bạn!</p><br>
            <b>Điện thoại: </b><span>0123987456</span><br>
            <b>Email: </b><span>reviewhanoi@gmail.com</span>
        </div>
        <div class="form">
            <div class="form__group">
                <label for="name">Họ và tên<i >*</i></label>
                <input type="text" id="name" placeholder="Nhập họ và tên">
            </div>
            <div class="form__group">
                <label for="phone">Điện thoại<i >*</i></label>
                <input type="tel" id="phone" placeholder="Nhập số điện thoại" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}">
            </div>
            <div class="form__group">
                <label for="">Email<i >*</i></label>
                <input type="email" id="email" placeholder="Email@email.com">
            </div>
            <div class="form__group">
                <label for="address">Địa chỉ<i >*</i></label>
                <input type="text" id="address" placeholder="Nhập địa chỉ">
            </div>
            <div class="form__group">
                <label for="message">Câu hỏi/Lời nhắn<i >*</i></label>
                <textarea type="text" id="message" placeholder="Nhập câu hỏi"></textarea>
            </div>
            <div class="btn-submit">
                <button type="submit">GỬI</button>
            </div>
        </div>

    </div>

@endsection