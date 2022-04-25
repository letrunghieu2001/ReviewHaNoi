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
        <div id="image-post">
          <h3>Ảnh thumbnail</h3>
          
        <div class="ip">
          <input type="file" name="thumbnail" id="thumbnail" class="file_custom">
          <div><img width=30% src="{{ asset("uploads/thumb/$post->thumbnail") }}" id='img' ></div>
        </div>
        <h3>Ảnh bài đăng</h3>
        <div class="ip">          
          <input type="file" name="image" id="image" class="file_custom">
          <div><img width=30% src="{{ asset("uploads/post/$post->image") }}" id='img_post'></div>
        </div>
      </div>
      <div class="form--details">
      
      

            <div class="form__group">
              <label for="name" >Tên địa điểm:</label>
              <input type="text" name="name" id="name" value="{{ $post->name }}">
            </div>
            @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
            <div class="form__group">
            <label for="category">Phân loại:</label>
            <select name="category_id" id="gender">
            <option value="1" <?php echo $post->category_id == '1' ? 'selected' :'' ?> > Nhà hàng</option>
                      <option value="2" <?php echo $post->category_id == '2' ? 'selected' :'' ?>> Quán ăn</option>
                      <option value="3" <?php echo $post->category_id == '3' ? 'selected' :'' ?>> Ăn vặt</option>
                      <option value="4" <?php echo $post->category_id == '4' ? 'selected' :'' ?>> Quán cà phê</option>
                      <option value="5" <?php echo $post->category_id == '5' ? 'selected' :'' ?>> Di tích lịch sử</option>
                      <option value="6" <?php echo $post->category_id == '6' ? 'selected' :'' ?>> Địa điểm check-in</option>
                      <option value="7" <?php echo $post->category_id == '7' ? 'selected' :'' ?>> Homestay - Khách sạn</option>
            </select>
            </div>
                      <div class="form__group">
          <label for="address">Địa chỉ:</label>
              <input type="text" name="address" id="address" value="{{ $post->address }}">
          </div>
          @error('address')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        
            <div class="form__group">
            <label for="district">Quận:</label>
            <select name="district_id" id="gender">
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

          @error('phone_number')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          <div class="form__group">
            <label for="time">Thời gian:</label>
            <input type="text" name="time" id="time" value="{{ $post->time }}" class="form-control"  aria-describedby="helpId" >
          </div>
          @error('time')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          <div class="form__group">
            <label for="map">Thời gian:</label>
            <input type="text" name="map" id="map" value="{{ $post->map }}" class="form-control"  aria-describedby="helpId" >
          </div>
          @error('map')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          <div class="form__group">
            <label for="link">Link:</label>
            <input type="text" name="link" id="link" value="{{ $post->link }}" class="form-control"  aria-describedby="helpId" >
          </div>
          @error('link')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          <div class="form__group">
          <label for="headings">Đề mục:</label>
          <input type="text" name="title" id="headings" value="{{ $post->title }}" class="form-control"  aria-describedby="helpId" >
          @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form__group">
          <label for="content">Nội dung:</label>
          <textarea id="content" name="content" id="content">{{ $post->content }}</textarea> 
          @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
</div>
      
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>

      </div>
        
</form>
@endif
    <script>
 
const input = document.querySelector('#thumbnail');
     const postInput = document.querySelector('#image');

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
    $("#img").css("object-fit", "cover");
})

function handleFilesPost(files) {
    console.log(files)
    const reader = new FileReader()
    reader.onload = function() {
        const img_post = document.querySelector('#img_post')
        img_post.src = reader.result
    }
    reader.readAsDataURL(files[0])
}
postInput.addEventListener('change', function(e) {
    handleFilesPost(postInput.files);
    $("#img_post").css("max-height", "200px");
    $("#img_post").css("object-fit", "cover");
})
 
    </script>
@endsection
