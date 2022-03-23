

@extends('layouts.user.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')
<div class="top">
    <!-- // start menu -->
     <!-- Nav -->
     <nav class="main-nav">
        <div class="toggle-btn">
          <div></div>
        </div>
      </nav>


    <div class="nav">
        <ul class="row1">
            <li><a href="{{ url('info') }}">Giới thiệu</a></li>
            <li><a href="#">Liên Hệ</a></li>
            <li class="widtht"><a href="#">Chính sách bảo mật</a></li>
            <li><a href="#">Hỗ trợ</a></li>
            <li><img src="{{ asset('assets/img/home/menu/vn.png') }}" alt="Viet_Nam"></li>
        </ul>
        <ul class="row2">
            <div class="menu">
            <li><img id="logo" src="{{ asset('assets/img/home/menu/logo.png') }}" alt="logo"></li>
            <li><a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/home/menu/home.png') }}" alt="">
                <span>    Trang chủ</span>
                </a>
            </li>
            <li><a href="#">
                <img src="{{ asset('assets/img/home/menu/gift.png') }}" alt="">
                <span>Ưu đãi đặc biệt</span>
                </a>
            </li>
            <li><a href="{{ url('/posts') }}">
                <img src="{{ asset('assets/img/home/menu/category.png') }}" alt="">
                <span> Danh mục </span>
                </a>
            </li>
            </div>
            @if (Auth::check())
            <li class="admin">
            <a href="{{ url('/adminstration') }}">
              @if (Auth::user()->role_id == 1)  Admin  @endif
              @if (Auth::user()->role_id == 2) User @endif
            </a>
          </li>
          @endif
          @if (Auth::check())
          <li class="admin" style="display: table-cell;">
            <a class="nav-link dropdown-toggle" style="padding: 13px 15px;" data-toggle="dropdown" href="{{ url("") }}" role="button" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle img" width="20%" src="{{ asset("/uploads/avatars/".Auth::user()->avatar) }}">
              <span class="name"> {{ Auth::user()->name }} </span>
            </a>
            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
              <a class="dropdown-item" href="{{ url("/user/self_show") }} ">
                <i class="fa fa-user icon"></i> Profile </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('/logout')}}">
                <i class="fa fa-power-off icon"></i> Logout </a>
            </div>
          </li>
            @else
            <li class="admin">
                <a href="{{ url('login') }}">Đăng nhập</a>
            </li>
            @endif
        </ul>
    </div>
    <!-- // end menu -->
<!-- Form -->
<div class="user__setup container">

    <div class="basic__info">
      <div class="logo">
        <img src="{{ asset("/uploads/avatars/$user->avatar") }}" alt="avatar">
      </div>
      <div class="form__group">
        <img src="{{ asset('assets/img/id.png') }}" alt="id">
        <h3>{{ $user->name }}</h3>
      </div>

      
      <div class="form__group">
        <img src="{{ asset('assets/img/calendar.png') }}" alt="calendar">
        <h3>{{ $user->dob }}</h3>
      </div>

      <div class="form__group">
        <img src="{{ asset('assets/img/email.png') }}" alt="email">
        <h3>{{ $user->email }}</h3>
      </div>
    </div>


      <div class="details__info">
        <div class="title">
          <p>Cập nhật thông tin cá nhân</p>
        </div>

        <form action="{{url("/user/update_avt/$user->id")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img class="mw-200px mb-3" id="img" style="width:300px;height:300px;"  src="{{ asset("/uploads/avatars/$user->avatar") }}">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" name="avatar">
                        </div>
                        <div class="col-md-6">
                            <button id="avt" type="submit" class="btn btn-primary">Lưu Avatar</button>
                        </div>
                    </div>
                </form>
                <form action="{{url("/user/self_edit/$user->id")}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form__group">
              <label for="name">Họ tên</label>
              <input type="text" name="name" id="name"  value="{{ $user->name }}">
            </div>
            @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                        <label>Giới tính</label>
                        <input type="radio" name="gender" id="male" value="Nam" <?php echo $user->gender == 'Nam' ? 'checked' :'' ?> />
                        <label for="male">Nam</label>
                        <input type="radio" name="gender" id="female" value="Nữ" <?php echo $user->gender == 'Nữ' ? 'checked' :'' ?> />
                        <label for="female">Nữ</label>
                    </div>
          <div class="form__group">
            <label for="dob">Ngày sinh</label>
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of birth" aria-describedby="helpId" value="{{ $user->dob }}">
          </div>
          @error('dob')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror

          <div class="form__group">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="address" aria-describedby="helpId" value="{{ $user->address }}">
          </div>
          @error('address')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>

        
      </div>

  </div>
  
  <footer class="container">
      <div class="footer__content">
          <div class="footer__logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
            <h1>Bring Ha Noi to you!</h1>
          </div>
          <div class="footer__contact">
            <h3>Contact</h3>
            <h3>0123456789</h3>
            <h3>reviewhanoi@gmail.com</h3>
          </div>
          <div class="footer__socials">
            <h3>Follow us</h3>
            <div class="socials">
              <a href="#"><img src="{{ asset('assets/img/facebook.png') }}" alt="facebook"></a>
              <a href="#"><img src="{{ asset('assets/img/instagram.png') }}" alt="instagram"></a>
              <a href="#"><img src="{{ asset('assets/img/tik-tok.png') }}" alt="tiktok"></a>
            </div>
          </div>
      </div>
      <div class="footer__info">
        <h3>Copyright &copy; 2020-2021. All right reserved by <span>ReviewHanoi</span></h3>
        <a href="#"><i class="fa-solid fa-circle-arrow-up"></i></i></a>
      </div>
  </footer>
  <script>
    const input = document.querySelector('input[type="file"]')

    function handleFiles (files) {
      console.log(files)
      const reader = new FileReader()
      reader.onload = function () {
        const img = document.querySelector('#img')
        img.src = reader.result
      }
      reader.readAsDataURL(files[0])
    }

    input.addEventListener('change', function (e) {
      handleFiles(input.files)
    })
</script>
@endsection

