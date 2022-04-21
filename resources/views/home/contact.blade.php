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


    </div>

@endsection