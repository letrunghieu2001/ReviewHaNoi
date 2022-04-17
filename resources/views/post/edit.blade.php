@extends('layouts.post_crud.app')

@section('title')
    Edit Post
@endsection

@section('content')

@if(Auth::check())
    <!-- Form -->


<form action="{{ url("/posts/$post->id") }}" method="POST" enctype="multipart/form-data" id="form">
@csrf
@method('PUT')
        <div class="title">
          <h3>Chỉnh sửa bài đăng</h3>
        </div>
        <div id="form--info">
 
      <div class="form--details">
      
      <div class="form__group">
              <label for="thumbnail">Ảnh thumbnail:</label>
              <input type="file" name="thumbnail" id="thumbnail" >
              <div><img width=30% src="{{ asset("/uploads/thumb/$post->thumbnail") }}" id='img'></div>
            </div>

            <div class="form__group">
              <label for="name" >Tên địa điểm:</label>
              <input type="text" name="name" id="name" value="{{ $post->name }}">
            </div>

            <div class="form__group">
            <label for="category">Quận:</label>
            <select name="category_id" id="category">
            <option value="1" <?php echo $post->category_id == '1' ? 'selected' :'' ?> > Nhà hàng</option>
                      <option value="2" <?php echo $post->category_id == '2' ? 'selected' :'' ?>> Quán ăn</option>
                      <option value="3" <?php echo $post->category_id == '3' ? 'selected' :'' ?>> Ăn vặt</option>
                      <option value="4" <?php echo $post->category_id == '4' ? 'selected' :'' ?>> Quán cà phê</option>
                      <option value="5" <?php echo $post->category_id == '5' ? 'selected' :'' ?>> Di tích lịch sử</option>
                      <option value="6" <?php echo $post->category_id == '6' ? 'selected' :'' ?>> Địa điểm check-in</option>
                      <option value="7" <?php echo $post->category_id == '7' ? 'selected' :'' ?>> Homestay - Khách sạn</option>
            </select>
            
                      <div class="form__group">
          <label for="address">Địa chỉ:</label>
              <input type="text" name="address" id="address" value="{{ $post->address }}">
          </div>

        </div>
            <div class="form__group">
            <label for="district">Phân loại:</label>
            <select name="district_id" id="district">
            <option value="1" <?php echo $post->distict_id == '1' ? 'selected' :'' ?> > Quận Ba Đình</option>
                      <option value="3" <?php echo $post->distict_id == '3' ? 'selected' :'' ?>> Quận Cầu Giấy</option>
                      <option value="4" <?php echo $post->distict_id == '4' ? 'selected' :'' ?>> Quận Đống Đa</option>
                      <option value="11" <?php echo $post->distict_id == '11' ? 'selected' :'' ?>> Quận Tây Hồ</option>
                      <option value="2" <?php echo $post->distict_id == '2' ? 'selected' :'' ?>> Quận Bắc Từ Liêm</option>
                      <option value="10" <?php echo $post->distict_id == '10' ? 'selected' :'' ?>> Quận Nam Từ Liêm</option>
                      <option value="7" <?php echo $post->distict_id == '7' ? 'selected' :'' ?>> Quận Hoàn Kiếm</option>
                      <option value="8" <?php echo $post->distict_id == '8' ? 'selected' :'' ?>> Quận Hoàng Mai</option>
                      <option value="9" <?php echo $post->distict_id == '9' ? 'selected' :'' ?>> Quận Long Biên</option>
                      <option value="12" <?php echo $post->distict_id == '12' ? 'selected' :'' ?>> Quận Thanh Xuân</option>
                      <option value="5" <?php echo $post->distict_id == '5' ? 'selected' :'' ?>> Quận Hà Đông</option>
                      <option value="6" <?php echo $post->distict_id == '6' ? 'selected' :'' ?>> Quận Hai Bà Trưng</option>
            </select>
            
            
        </div>

          <div class="form__group">
            <label for="phone_number">Điện thoại:</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $post->phone_number }}" class="form-control"  aria-describedby="helpId" >
          </div>
          <div class="form__group">
            <label for="time">Thời gian:</label>
            <input type="text" name="time" id="time" value="{{ $post->time }}" class="form-control"  aria-describedby="helpId" >
          </div>
          <div class="form__group">
            <label for="link">Link:</label>
            <input type="text" name="link" id="link" value="{{ $post->link }}" class="form-control"  aria-describedby="helpId" >
          </div>
          <div class="form__group">
            Đề mục:
          <textarea id="title" name="title">{{ $post->title }}</textarea>
          
          </div>
          <div class="form__group">
          
          <textarea id="content" name="content">{{ $post->content }}</textarea>
                
          </div>

          <div class="form__group">
              <label for="image">Ảnh bài đăng:</label>
              <input type="file" name="image" id="image">
              <div><img width=30% src="{{ asset("/uploads/post/$post->image") }}" id='img'></div>
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
