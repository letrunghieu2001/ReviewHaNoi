@extends('layouts.login.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')
<article class="content forms-page">
    <div class="card">
        <h1 class="text-IBM"> Cập nhật thông tin cá nhân</h1>
    </div>
    <div class="row sameheight-container">
        <div class="col-md-12">
            <div class="card card-block sameheight-item">
                <form action="{{url("/users/update_avt/$user->id")}}" method="POST" enctype="multipart/form-data">
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
                <form action="{{url("/users/self_edit/$user->id")}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="name">Họ tên</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder=" Name" aria-describedby="helpId" value="{{ $user->name }}">
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
                    @error('gender')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="dob">Ngày sinh</label>
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of birth" aria-describedby="helpId" value="{{ $user->dob }}">
                    </div>
                    @error('dob')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="address"> Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="address" aria-describedby="helpId" value="{{ $user->address }}">
                    </div>
                    @error('address')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId" value="{{ $user->email }}" readonly>
                    </div>
                    @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    
                   
                    <div class="right">
                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>
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