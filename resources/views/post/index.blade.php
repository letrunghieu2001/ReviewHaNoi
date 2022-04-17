@extends('layouts.search.app')

@section('title')
Full Post
@endsection

@section('content')

<div class="box">

    
    <div class="articles">
       
        @foreach ($posts as $post)
        <a  href="{{ url("/posts/$post->post_id") }}"  class="art"> 

            <img src="{{ asset("assets/img/thumb/$post->thumb") }}" alt="">

            <div class="content">
                <h4 class="title">{{ $post->post_name }}</h4>
                <div>{{ $post->address }}</div>
                <div>{{ $post->category_name }}</div>
                <div>{{ $post->time }}</div>
            </div>
        </a>

@endforeach


   
        </div>

</div>


<div class="bg"></div>
@endsection 