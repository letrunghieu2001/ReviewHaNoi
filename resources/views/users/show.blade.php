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
          @if ( $user->role_id == 1)
            <li><a href="#">Xoá quyền quản trị viên</a></li>
            @endif
          @if ( $user->role_id == 2)
            <li><a href="#">Chỉ định làm quản trị viên</a></li>
            @endif
            <li>
            <a class="dropdown-item mt-3 mb-3" href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('user-delete-{{ $user->id }}').submit()">
                                        <img src="{{ asset('assets/img/forum/delete (1).png') }}" class="icon_post tt-icon-btn">
                                        <span>Xóa người dùng</span>
                                        <form action='{{ url("/user/{$user->id}") }}' method="POST" id="user-delete-{{ $user->id }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </a>
            </li>
            
          </ul>
        </div>
      </div>
@endforeach
  </div>

@endsection