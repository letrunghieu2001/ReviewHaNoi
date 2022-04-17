@extends('layouts.post.app')

@section('title')
    Create new post
@endsection

@section('content')
    @if(Auth::check())
    <!-- create new post -->
        
            
                <div class="title">Tạo bài đăng</div>
                <div class="box">
                    <form method="POST" action="{{ url("/posts") }}">
                    @csrf
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
            </div>
            <div class="input">
                <input id="name" type="text" name="name"><br>
                <input id="address" type="text" name="address"><br>
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
                <br>
                <select name="category_id" id="category">
                      <option value="1" > Nhà hàng</option>
                      <option value="2" > Quán ăn</option>
                      <option value="3" > Ăn vặt</option>
                      <option value="4" > Quán cà phê</option>
                      <option value="5" > Di tích lịch sử</option>
                      <option value="6" > Địa điểm check-in</option>
                      <option value="7" > Homestay - Khách sạn</option>
                    
                </select>
                <input type="text" name="phone_number" ><br>
                <input id="link" type="text" name="link"><br>
                <input type="text" name="time"><br>
                <textarea id="title" name="title"></textarea>
                <textarea id="content" name="content"></textarea>
            </div>
            
       

            
            <div id="imagesUp"></div>

                <div>
                    <input type="file" accept="image/*" name="image" id="choose-file"  multiple="multiple" >
                    <label for="choose-file">Thêm ảnh bài post</label>
                </div>

        </div>
        <button class="submit" type="submit" > Tạo bài đăng </button>
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

