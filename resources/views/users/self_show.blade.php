@extends('layouts.login.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')
<article class="content">
    <div class="card">
        <h1 class="text-IBM"> Thông tin cá nhân</h1>
    </div>
    <div class="card card-block sameheight-item">
        <img class="mw-200px mb-3" id="img" style="width:300px;height:300px;" src="{{ asset("/uploads/avatars/$user->avatar") }}">
        <table class="table">
            <tr>
                <td class="w-25">ID:</td>
                <td> {{ $user->id }}</td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>{{ $user->gender }}</td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td>{{ $user->dob }}</td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td> {{ $user->address }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td> {{ $user->email }}</td>
            </tr>
        </table>
        <div class="right">
            <a href='{{ url("/users/self_edit") }}' class="btn btn-primary"> Thay đổi thông tin</a>
        </div>
    </div>
</article>
@endsection