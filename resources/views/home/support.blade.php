@extends('layouts.home.app')

@section('title')
Hỗ trợ
@endsection

@section('content')
<div id="support">
        
        <div class="ctImg">
            <img src="{{ asset('assets/img/support/img_bg.jpg') }}" alt="bg">
        </div>
        <div class="inner">
            <div class="title">
                <h2>Chúng tôi có thể giúp gì được cho bạn?</h2>
            </div>
            
            <div class="menu-linkbox">
                <div class="linkbox">
                    <a href="">
                        <span class="icon"><img src="{{ asset('assets/img/support/phone.png') }}" alt="phone"></span>
                        <h3>Điện thoại</h3>
                        <span class="text">Liên hệ: 0123987456</span>
                    </a>
                </div>
                <div class="linkbox">
                    <a href="">
                        <span class="icon"><img src="{{ asset('assets/img/support/mail.png') }}" alt="phone"></span>
                        <h3>Email</h3>
                        <span class="text">reviewhanoi@gmail.com</span>
                    </a>
                </div>
                <div class="linkbox">
                    <a href="">
                        <span class="icon"><img src="{{ asset('assets/img/support/twitter.png') }}" alt="phone"></span>
                        <h3>Twitter</h3>
                        <span class="text">twitter.com</span>
                    </a>
                </div>
                <div class="linkbox">
                    <a href="">
                        <span class="icon"><img src="{{ asset('assets/img/support/fb.png') }}" alt="phone"></span>
                        <h3>Facebook</h3>
                        <span class="text">https://www.facebook.com/trunghieu.le.39501</span>
                    </a>
                </div>
                <div class="linkbox">
                    <a href="">
                        <span class="icon"><img src="{{ asset('assets/img/support/insta.png') }}" alt="phone"></span>
                        <h3>Instagram</h3>
                        <span class="text">https://www.instagram.com/accounts/login/?next=/_trunghieule_/</span>
                    </a>
                </div>
                <div class="linkbox">
                    <a href="">
                        <span class="icon"><img src="{{ asset('assets/img/support/youtube.png') }}" alt="phone"></span>
                        <h3>Youtube</h3>
                        <span class="text">youtube.com</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection