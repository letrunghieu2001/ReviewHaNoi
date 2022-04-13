@extends('layouts.user.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')
<div id="user__control" class="container">

    <div class="title">
      <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
      <h2>Quản lý người dùng</h2>
    </div>

    <div class="user__control">
    @foreach ($users as $user)
      <div class="user">
        <div class="user__image">
          <img src="{{ asset("/uploads/avatars/$user->avatar") }}" alt="#">
        </div>
        <label for="">{{ $user->name }}</label>
        <label for="">{{ $user->email }}</label>
        <div class="three__dots">
          <img src="{{ asset('assets/img/meatball.png') }}" alt="">
          <ul class="subMenu">
            <li><a href="#">Chỉ định làm quản trị viên</a></li>
            <li><a href="#">Quản lý bình luận</a></li>
            <li><a href="#">Xóa tài khoản</a></li>
          </ul>
        </div>
      </div>
@endforeach
  </div>

@endsection