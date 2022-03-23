@extends('layouts.login.app')

@section('title')
Đăng nhập
@endsection

@section('content')
    <!-- form login -->
    <form action="{{ url('login') }}" class="form" method="POST">
      @csrf
    <img src="{{ asset('assets/img/login/logo.png') }}" alt="#">
    <h3 style="align-self: center;">Xin chào</h3>

    <div class="form__input">
      <div class="form__group">
        <h3>Email</h3>
        <div class="input__box">
        <img src="{{ asset('assets/img/user.png') }}" alt="user">
          <input type="email" name="email" id="email"  placeholder="Nhập email của bạn" value="{{ old('email') }}">
        </div>
      </div>
      @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

      <div class="form__group">
        <h3>Password</h3>
        <div class="input__box">
        <img src="{{ asset('assets/img/padlock.png') }}" alt="lock">
          <input type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn">
        </div>
      </div>
      @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
    </div>
    @error('invalid')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
    <div id="checked">
      <input type="checkbox" id="remember-me" name="remember-me">
      <h4>Ghi nhớ tài khoản</h3>
    </div>    

      <button id="form__button" value="Login">Đăng nhập</button>
      <a href="#" class="form__link">Quên mật khẩu</a>
    <div class="form__footer">
      <p>Không có tài khoản ?</p>
      <a href="{{ url('register') }}" class="form__link">Đăng ký</a>
    </div>
    
  </form>
    @endsection

    