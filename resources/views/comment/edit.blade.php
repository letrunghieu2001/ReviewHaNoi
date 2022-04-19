@extends('layouts.post_crud.app')

@section('title')
    Edit comment
@endsection
@section('content')
    @if(Auth::check())
        @if(($comment->user_id == Auth::user()->id))
        <!-- Edit comment -->
        <form action="{{url("/comments/$comment->id")}}" method="POST" enctype="multipart/form-data" id="form">
@csrf
@method('PUT')
        <div class="title">
          <h3>Chỉnh sửa bình luận</h3>
        </div>
        <div id="form--info">
        
      <div class="form--details">
          <div class="form__group">
          <label for="content">Nội dung:</label>
          <textarea id="content" name="content" id="content" value="{{ old('content') }}">{{ $comment->content }}</textarea> 
          @error('content')
                    <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
</div>
      
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>

      </div>
        
</form>
        @endif
    @endif
@endsection       