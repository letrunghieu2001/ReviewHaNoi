@extends('layouts.post_crud.app')

@section('title')
    Create new post
@endsection

@section('content')
    @if(Auth::check())
    <!-- Form -->


<div id="form">
        <div class="title">
          <h3>Tạo bài đăng</h3>
        </div>
        <div id="form--info">
      <div id="avatar">
      <form action="{{url("/posts/upload_thumbnail")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img id="img"  src="">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" style="width:100px;height:100px" name="thumb">
                        </div>
                        <div class="col-md-6">
                            <button id="avt" type="submit" class="btn btn-primary">Lưu Ảnh Thumbnail</button>
                        </div>
                    </div>
                </form>
      
      </div>
      <div class="form--details">
                <form action="{{ url("/posts") }}" method="POST">
                @method('PUT')
                @csrf
            <div class="form__group">
              <label for="name">Tên địa điểm:</label>
              <input type="text" name="name" id="name">
            </div>

            <div class="form__group">
            <label for="category">Quận:</label>
            <select name="category_id" id="category">
            <option value="1" > Nhà hàng</option>
                      <option value="2" > Quán ăn</option>
                      <option value="3" > Ăn vặt</option>
                      <option value="4" > Quán cà phê</option>
                      <option value="5" > Di tích lịch sử</option>
                      <option value="6" > Địa điểm check-in</option>
                      <option value="7" > Homestay - Khách sạn</option>
            </select>
            
                      <div class="form__group">
          <label for="address">Địa chỉ:</label>
              <input type="text" name="address" id="address">
          </div>

        </div>
            <div class="form__group">
            <label for="district">Phân loại:</label>
            <select name="district_id" id="district">
                      <option value="1"> Quận Ba Đình</option>
                      <option value="3"> Quận Cầu Giấy</option>
                      <option value="4"> Quận Đống Đa</option>
                      <option value="11"> Quận Tây Hồ</option>
                      <option value="2"> Quận Bắc Từ Liêm</option>
                      <option value="10"> Quận Nam Từ Liêm</option>
                      <option value="7"> Quận Hoàn Kiếm</option>
                      <option value="8"> Quận Hoàng Mai</option>
                      <option value="9"> Quận Long Biên</option>
                      <option value="12"> Quận Thanh Xuân</option>
                      <option value="5"> Quận Hà Đông</option>
                      <option value="6"> Quận Hai Bà Trưng</option>
            </select>
            
            
        </div>

          <div class="form__group">
            <label for="phone_number">Điện thoại:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control"  aria-describedby="helpId" >
          </div>
          <div class="form__group">
            <label for="time">Thời gian:</label>
            <input type="text" name="time" id="time" class="form-control"  aria-describedby="helpId" >
          </div>
          <div class="form__group">
            <label for="link">Link:</label>
            <input type="text" name="link" id="link" class="form-control"  aria-describedby="helpId" >
          </div>
          <div class="form__group">
          <textarea id="title" name="title"></textarea>
                
          </div>
          <div class="form__group">
          <textarea id="content" name="content"></textarea>
                
          </div>
<form action="{{url("/posts/upload_image")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img id="img"  src="">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" style="width:100px;height:100px" name="thumb">
                        </div>
                        <div class="col-md-6">
                            <button id="avt" type="submit" class="btn btn-primary">Lưu Ảnh Bài đăng</button>
                        </div>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>

                </form>
      </div>
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

@endif
@endsection
