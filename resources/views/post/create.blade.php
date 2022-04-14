@extends('layouts.post.app')

@section('title')
    Create new post
@endsection

@section('content')
    @if(Auth::check())
        <!-- create new post -->
        <form method="POST" action="{{ url("/posts") }}">
            @csrf
            <main id="tt-pageContent" class="bg-main">
                <div class="container">
                    <div class="title-block">
                        <h3 class="title"> 
                            Create New Post <span class="sparkline bar" data-type="bar"></span>
                        </h3>
                    </div>
                    <form name="item">
                        {{-- @csrf --}}
                        <div class="card card-block">
                            <!-- Avatar -->
                            <div class="form-group row mb-5">
                                <div class="col-sm-2 text-xs-right">
                                    <img class="rounded-circle img" width="50" src="{{ asset("/uploads/avatars/".Auth::user()->avatar) }}">
                                </div>
                                <div class="col-sm-10 mt-3">
                                    <h4> {{ Auth::user()->name}} </h4>
                                </div>
                            </div>
                            <!-- Title -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Title: </label>
                                <div class="col-sm-10">
                                    <textarea class="summernoteTitle" name="title">
                                        {{ old('title') }}
                                    </textarea>
                                    @error('title')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label text-xs-right"> Content: </label>
                                <div class="col-sm-10">
                                    <textarea class="summernoteContent" name="content">
                                        {{ old('content') }}
                                    </textarea>
                                    @error('content')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="row form-group">
                                <div class="col-auto ml-md-auto">
                                    <button class="btn btn-primary btn-sm" type="submit">Create Post</button>
                                    <a class="btn btn-danger btn-sm ml-2" href="{{ url("/posts") }}">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </form>
    @endif
@endsection