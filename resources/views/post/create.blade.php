@extends('layouts.post.app')

@section('title')
    Create new post
@endsection

@section('content')
    @if(Auth::check())
    <!-- create new post -->
        <form method="POST" action="{{ url("/posts") }}">
            @csrf
                <div class="title">Tạo bài đăng</div>
                <div class="box">
        <div class="content">
            <div class="label">
                <p>Tên</p>
                <p>Địa chỉ</p>
                <p>Quận</p>
                <p>Phân loại</p>
                <p>Điện thoại</p>
                <p>Link</p>
                <p>Thời gian</p>
                <p>Đề mục</p>
                <p>Nội dung</p>
            </div>
            <div class="input">
                <input id="name" type="text"><br>
                <input id="address" type="text"><br>
                <select name="district" id="district">
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
                <select name="category" id="category">
                      <option value="1" > Nhà hàng</option>
                      <option value="2" > Quán ăn</option>
                      <option value="3" > Ăn vặt</option>
                      <option value="4" > Quán cà phê</option>
                      <option value="5" > Di tích lịch sử</option>
                      <option value="6" > Địa điểm check-in</option>
                      <option value="7" > Homestay - Khách sạn</option>
                    
                </select>
                <input type="tel" name="phone" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"><br>
                <input id="link" type="text"><br>
                <input type="text" name="bdaytime"><br>
                <input id="text" type="text"><br>
                <textarea id="contents"></textarea>
            </div>
            
            <div id="imagesUp"></div>
            <form method="POST" action="{{ url("/posts") }} >
                <div>
                    <input type="file" accept="image/*" id="choose-file" name="choose-file"  multiple="multiple"/>
                    <button id="" type="submit">Thêm ảnh</button>
                    <button id="image-saving" type="submit">Lưu ảnh</button>
                </div>
            </form>
        </div>
        
    </div>
    <input class="submit" type="submit" value="Submit">
        </form>
                        
    @endif
@endsection

