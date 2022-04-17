@extends('layouts.user_show.app')

@section('title')
ReviewHaNoi
@endsection

@section('content')

  <!-- Form -->
  <div class="user__setup container">


    <form >
      <div class="border__color">
        <div class="basic__info">

          <div class="logo">
            <img src="{{ asset("/uploads/avatars/$user->avatar") }}" alt="avatar"> 
           </div>

          <div class="border__color">
            <div class="form__group">
            <img src="{{ asset('assets/img/id.png') }}" alt="id">
            <h3 for="firstName">{{ $user->name }}</h3>
            </div>
          </div>

          <div class="border__color">
            <div class="form__group">
            <img src="{{ asset('assets/img/id.png') }}" alt="id">
            <h3 for="gender">{{ $user->gender }}</h3>
            </div>
          </div>
         
          <div class="border__color">
            <div class="form__group">
              <img src="{{ asset('assets/img/calendar.png') }}" alt="calendar">
              <h3 for="dob">{{ $user->dob }}</h3>
            </div>
          </div>
         
          <div class="border__color">
            <div class="form__group">
              <img src="{{ asset('assets/img/email.png') }}" alt="email">
              <h3>{{ $user->email }}</h3>
            </div>
          </div>
         
          <div class="border__color">
            <div class="form__group">
              <img src="{{ asset('assets/img/email.png') }}" alt="address">
              <h3 for="address">{{ $user->address }}</h3>
            </div>
          </div>

      </div>
    </div>
  </form>
  </div>

@endsection


