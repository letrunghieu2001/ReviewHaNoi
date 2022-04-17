

@extends('layouts.user_edit.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')

<!-- Form -->


<form id="form">
        <div class="title">
          <h3>Cập nhật thông tin cá nhân</h3>
        </div>
        <div id="form--info">
      <div id="avatar">
        <form action="{{url("/user/update_avt/$user->id")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img class="mw-200px mb-3" id="img" style="width:100px;height:100px;"  src="{{ asset("/uploads/avatars/$user->avatar") }}">
                    <input type="file" name="avatar">
                    <button id="avt" type="submit" class="btn btn-primary">Lưu Avatar</button>
                </form>
      </div>
      <div class="form--details">
                <form action="{{url("/user/self_edit/$user->id")}}" method="POST">
                @method('PUT')
                @csrf
            <div class="form__group">
              <label for="name">Họ tên</label>
              <input type="text" name="name" id="name"  value="{{ $user->name }}">
            </div>

               
        <div class="form__split">
          <div class="form__group">
            <label for="dob">Ngày sinh</label>
            <input type="date" name="dob" id="dob" value="{{ $user->dob }}">
            <span class="form__message"></span>
          </div>
          <div class="form__group">
            <label for="gender">Giới tính</label>
            <select name="gender" id="gender">
              <option value="Nam" <?php echo $user->gender == 'Nam' ? 'selected' :'' ?>>Nam</option>
              <option value="Nữ" <?php echo $user->gender == 'Nữ' ? 'selected' :'' ?>>Nữ</option>
              <option value="Khác" <?php echo $user->gender == 'Khác' ? 'selected' :'' ?>>Khác</option>
            </select>
            </option>
            
          </div>
        </div>


          <div class="form__group">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="address" aria-describedby="helpId" value="{{ $user->address }}">
          </div>

                <button type="submit" class="btn btn-primary">Lưu thông tin</button>

                </form>
      </div>
        </div>
</form>


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
