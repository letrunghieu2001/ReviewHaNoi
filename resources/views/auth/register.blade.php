

@extends('layouts.register.app')

@section('title')
Đăng ký
@endsection

@section('content')
 <!-- form sign up -->
 <form action="{{ url('register') }}" id="form-1" class="form" method="POST">
 @csrf
    <img src="{{ asset('assets/img/login/logo.png') }}" alt="#">
    <h3>Tạo tài khoản</h3>
    <div class="form__input">
    <div class="form__group">
        <label for="name" class="form__label">Tên của bạn:</label>
        <input type="name" name="name" id="name" placeholder="Nhập tên của bạn" required>
        <span class="form--message"></span>
      </div>
      
            <div class="form__group">
        <label for="email" class="form__label">Email:</label>
        <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required>
        <span class="form--message"></span>
      </div>
      @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
      <div class="form__group invalid">
        <label for="password" class="form__label">Password:</label>
        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn" required>
        <span class="form--message"></span>
      </div>
      @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

      <!-- <div class="form__group">
        <label for="password-confirmation" class="form__label">Re-enter password</label>
        <input type="password" name="" id="password-confirmation" placeholder="Confirm password" required>
        <span class="form--message"></span>
      </div> -->

      <button type="submit" id="form__button" value="Register">Đăng ký</button>
      <div class="form__footer">
      <p>Đã có tài khoản?</p>
      <a href="{{ url('login') }}" class="form__link">Đăng nhập</a>
    </div>



    </div>
  </form>
@endsection