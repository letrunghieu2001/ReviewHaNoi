@extends('layouts.post.app')

@section('title')
    Edit Post
@endsection

@section('content')

    @if(Auth::check())
            <!-- Edit post -->
      <div class="title">Chỉnh sửa bài đăng </div>
      <div class="box">   
           <form action="{{url("/posts/update_image/$post->id")}}" method="POST" enctype="multipart/form-data">
    @csrf
                    @method('PUT')    
    <button id="image-saving" type="submit">Lưu ảnh</button>
<div>
    <input type="file" accept="image/*" name="image" id="choose-file"   >
    <label for="choose-file">Thêm ảnh bài post</label>
</div>
</form>
            <form  method="POST" action="{{url("/posts/$post->id")}}">
                @csrf
                @method('PUT')
        <div class="content">
            <div class="label">
                <p>Tên</p>
                <p>Địa chỉ</p>
                <p>Quận</p>
                <p>Phân loại</p>
                <p>Điện thoại</p>
                <p>Link </p>
                <p>Thời gian</p>
                <p>Đề mục</p>
                <p>Nội dung</p>
                <p>Ảnh thumbnail</p>
            </div>
            <div class="input">
                <input id="name" type="text" name="name" value="{{$post->name}}"></input><br>
                <input id="address" type="text" name="address" value="{{$post->address}}"><br>
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
                <br>
                <select name="category_id" id="category">
                      <option value="1" <?php echo $post->category_id == '1' ? 'selected' :'' ?> > Nhà hàng</option>
                      <option value="2" <?php echo $post->category_id == '2' ? 'selected' :'' ?>> Quán ăn</option>
                      <option value="3" <?php echo $post->category_id == '3' ? 'selected' :'' ?>> Ăn vặt</option>
                      <option value="4" <?php echo $post->category_id == '4' ? 'selected' :'' ?>> Quán cà phê</option>
                      <option value="5" <?php echo $post->category_id == '5' ? 'selected' :'' ?>> Di tích lịch sử</option>
                      <option value="6" <?php echo $post->category_id == '6' ? 'selected' :'' ?>> Địa điểm check-in</option>
                      <option value="7" <?php echo $post->category_id == '7' ? 'selected' :'' ?>> Homestay - Khách sạn</option>
                    
                </select>
                <input type="text" name="phone_number" value="{{$post->phone_number}}" ><br>
                <input id="link" type="text" name="link" value="{{$post->link}}"><br>
                <input type="text" name="time" value="{{$post->time}}"><br>
                <textarea id="title" name="title" >{{$post->title}}</textarea>
                <textarea id="content" name="content"> {{$post->content}}</textarea>
            </div>


            
        <div id="imagesUp">

        <img  src="{{ asset("uploads/post/$post->image") }}">

        </div>

</div>
<button class="submit" type="submit" > Chỉnh sửa bài đăng </button>
</div>
</form>    

    @endif
    <script>
        const hamburgerBtn = document.querySelector(".toggle-btn");
const mainHeader = document.querySelector(".row2");

hamburgerBtn.addEventListener("click", function () {
  hamburgerBtn.classList.toggle("open");
  mainHeader.classList.toggle("open");
});


const chooseFile = document.getElementById("choose-file");
const lists = document.getElementById("imagesUp");
chooseFile.addEventListener("change", function () {
    getImgData();
  });

  function getImgData() {
    const files = chooseFile.files[0];
    
    var reader  = new FileReader();
    reader.onload = function(e)  {
        var image = document.createElement("img");
        image.src = e.target.result;
        lists.appendChild(image);
        image.classList.add('imgUp');
     }
     
     reader.readAsDataURL(files);
  }

  
    </script>
@endsection