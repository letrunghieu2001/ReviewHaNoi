@extends('layouts.home.app')

@section('title')
Full Post
@endsection

@section('content')
<!-- Create post -->
@if ((Auth::check()) || (Auth::user()->role_id == 1)  )
                    <a href='{{ url("/posts/create") }}' class="tt-icon-btn">
                        <p>Create Post</p>
                    </a>
                    @endif
<section class="example">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        
                                            <thead>
                                                <tr class="table-primary">
                                                    <th class="w20">Tên</th>
                                                    <th class="w60">Địa chỉ</th>
                                                    <th class="w20" >Phân loại</th>
                                                    <th class="w20" >Thời gian</th>
                                                </tr>
                                            </thead>
                                            @foreach ($places as $place)
                                                <tr>
                                                    <td class="w20"><a href="{{ url("/posts/$place->post_id") }}">{{ $place->name}}</a></td>
                                                    <td class="w60">{{ $place->address }}</td>
                                                    <td class="w20">{{ $place->category_name }}</td>
                                                    <td class="w20">{{ $place->time }}</td>
                                                </tr>
                                            @endforeach
                                        
                                            
                                        
                                    </table>
                                </div>
                            </section>
@endsection 