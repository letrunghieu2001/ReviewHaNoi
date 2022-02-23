@extends('layouts.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')


    <p>Hello {{ Auth::user()->email}} dang nhap thanh cong. Day la trang chu</p>
    <a class="dropdown-item" href="{{ url("/users/self_show") }} "> 
                                        <i class="fa fa-user icon"></i> Profile </a>
    <a class="dropdown-item" href="{{url('/logout')}}">
                                        <i class="fa fa-power-off icon"></i> Logout </a>
@endsection