

@extends('layouts.user.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')

<!-- Form -->


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
