@extends('layouts.login.app')

@section('title')
Quên mật khẩu
@endsection

@section('content')
<!-- form  -->
<form action="{{ route('forget.password.post') }}" id="form-1" class="form" method="POST">
 @csrf
    <img src="{{ asset('assets/img/login/logo.png') }}" alt="#">
    <h3>Quên mật khẩu</h3>
    <div class="form__input">
    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
      
            <div class="form__group">
        <label for="email" class="form__label">Email:</label>
        <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required>
        <span class="form--message"></span>
      </div>
      @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
      
      <button type="submit" id="form__button" value="Register">Gửi mail </button>
</form>
      <div class="form__footer">
      <p>Có sự nhầm lẫn?</p>
      <a href="{{ url('login') }}" class="form__link">Đăng nhập</a>
    </div>



    </div>
  </form>
@endsection
