@extends('layouts.front-end')

@section('content')
<div class="">
  
  <div class="col-xs-12">
    
    <div id="yubali_pic" class="carousel slide" data-ride="carousel"
      data-interval="3000">

      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#yubali_pic" data-slide-to="0" class="active"></li>
        <li data-target="#yubali_pic" data-slide-to="1"></li>
        <li data-target="#yubali_pic" data-slide-to="2"></li>
        <li data-target="#yubali_pic" data-slide-to="3"></li>
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('images/worship1.jpg')}}" alt="Yubali Picture">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/worship2.jpg')}}" alt="Yubali Picture">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/worship3.jpg')}}" alt="Yubali Picture">
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/worship4.jpg')}}" alt="Yubali Picture">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#yubali_pic" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#yubali_pic" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>
    
    <br>
    
    <div>
      @include('includes.about_content')
    </div>
        
  </div>
  
</div>
@endsection