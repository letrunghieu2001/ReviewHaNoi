@extends('layouts.post_crud.app')

@section('title')
    Create new post
@endsection

@section('content')
    @if(Auth::check())
    <!-- Form -->


<form action="{{ url("/posts") }}" method="POST" enctype="multipart/form-data" id="form">
@csrf
        <div class="title">
          <h3>Tạo bài đăng</h3>
        </div>
        <div id="form--info">
 
      <div class="form--details">
      
      <div class="form__group">
              <label for="thumbnail">Ảnh thumbnail:</label>
              <input type="file" name="thumbnail" id="thumbnail">
              <div><img width=30% src="" id='img'></div>
            </div>

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
            Đề mục:
          <textarea id="title" name="title"></textarea>
                
          </div>
          <div class="form__group">
            Nội dung:
          <textarea id="content" name="content"></textarea>
                
          </div>

          <div class="form__group">
              <label for="image">Ảnh bài đăng:</label>
              <input type="file" name="image" id="image">
              <div><img width=30% src="" id='img'></div>
            </div>

                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
@endif
      </div>
        </div>
</form>
  <script>
     const input = document.querySelector('input[type="file"]')

function handleFiles(files) {
    console.log(files)
    const reader = new FileReader()
    reader.onload = function() {
        const img = document.querySelector('#img')
        img.src = reader.result
    }
    reader.readAsDataURL(files[0])
}

input.addEventListener('change', function(e) {
    handleFiles(input.files);
    $("#img").css("max-height", "200px");
    $("#img").css("object-fit", "contain");
})
</script>

@endsection
