@extends('layouts.login.app')

@section('title')
Quên mật khẩu
@endsection

@section('content')
<!-- form  -->
<form action="{{ route('reset.password.post') }}" id="form-1" class="form" method="POST">
 @csrf
    <img src="{{ asset('assets/img/login/logo.png') }}" alt="#">
    <h3>Thay đổi mật khẩu</h3>
    <div class="form__input">
    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <input type="hidden" name="token" value="{{ $token }}">
            <div class="form__group">
        <label for="email" class="form__label">Email:</label>
        <input type="email" name="email" id="email" placeholder="Nhập email của bạn" value="{{ old('email') }}" required>
        <span class="form--message"></span>
      </div>
      @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
            <div class="form__group">
        <label for="password" class="form__label">Mật khẩu:</label>
        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn" required>
        <span class="form--message"></span>
      </div>
      @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
            <div class="form__group">
        <label for="password-confirm" class="form__label">Xác nhận mật khẩu:</label>
        <input type="password" name="password_confirmation" id="password-confirm" placeholder="Nhập lại mật khẩu của bạn" required>
        <span class="form--message"></span>
      </div>
      @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
      
      <button type="submit" id="form__button" value="">Đặt lại mật khẩu</button>





    </div>
  </form>
@endsection
