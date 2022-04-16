@extends('layouts.user_show.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')

  <!-- Form -->
  <div class="user__setup container">
    <!-- left panel -->
    <form >
      <div class="border__color">
        <div class="basic__info">

          <div class="logo">
            <img src="{{ asset("/uploads/avatars/$user->avatar") }}" alt="avatar"> 
           </div>

          <div class="border__color">
            <div class="form__group">
            <img src="{{ asset('assets/img/id.png') }}" alt="id">
            <label for="firstName">{{ $user->name }}</label>
            </div>
          </div>
         
          <div class="border__color">
            <div class="form__group">
              <img src="{{ asset('assets/img/calendar.png') }}" alt="calendar">
              <label for="dob">{{ $user->dob }}</label>
            </div>
          </div>
         
          <div class="border__color">
            <div class="form__group">
              <img src="{{ asset('assets/img/email.png') }}" alt="email">
              <h3>{{ $user->email }}</h3>
            </div>
          </div>
         
      </div>
    </div>
  </form>
    <!-- right panel  -->
    <div class="border__color">
      <div class="details__info">
        <div class="title">
          <p>Thông tin tài khoản</p>
        </div>
            <div class="form__group">
              <label for="firstName">Họ tên<span>*</span></label>
              <input type="text" name="firstName" readonly id="firstName"  value="{{ $user->name }}">
            </div>
          
            <div class="form__group">
              <label for="gender">Giới tính</label>
              <input type="text" name="gender" id="gender" readonly value="{{ $user->gender }}">
            </div>

          <div class="form__group">
            <label for="dob">Ngày sinh</label>
            <input type="date" name="dob" id="dob" value="{{ $user->dob }}" readonly>
          </div>

          <div class="form__group">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" value="{{ $user->address }}" readonly>
          </div>

          <div class="form__group">
            <label for="address">Quyền</label>
            @if ((Auth::user()->role_id == 1) )
            <input type="text" name="address" id="address" value="Admin" readonly>
            @endif
            @if ((Auth::user()->role_id == 2) )
            <input type="text" name="address" id="address" value="User" readonly>
            @endif

          </div>

          <button id="btn--update" type="submit"><a href="{{ url('/user/self_edit') }}">Cập nhật thông tin cá nhân</a></button>
        
      </div>
    </div>

@endsection


