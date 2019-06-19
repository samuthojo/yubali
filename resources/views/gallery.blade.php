@extends('layouts.front-end')

@section('content')

<div class="row mb-sm-4">
  
  <div class="col-sm-8">
    
    <div class="row">
      <div class="col-sm-4">
        <img src="{{asset('images/index1.jpg')}}" class="gallery-pic" 
          alt="Gallery Pic">
      </div>
      <div class="col-sm-4 mt-2 mt-sm-none">
        <img src="{{asset('images/index2.jpg')}}" class="gallery-pic" 
          alt="Gallery Pic">
      </div>
      <div class="col-sm-4 mt-2 mt-sm-none">
        <img src="{{asset('images/index3.jpg')}}" class="gallery-pic" 
          alt="Gallery Pic">
      </div>
    </div>
    
    <div class="row mt-sm-2">
      <div class="col-sm-4 mt-2 mt-sm-none">
        <img src="{{asset('images/index4.jpeg')}}" class="gallery-pic" 
          alt="Gallery Pic">
      </div>
      <div class="col-sm-4 mt-2 mt-sm-none">
        <img src="{{asset('images/index5.jpeg')}}" class="gallery-pic" 
          alt="Gallery Pic">
      </div>
      <div class="col-sm-4 mt-2 mt-sm-none">
        <img src="{{asset('images/index6.jpg')}}" class="gallery-pic"
          alt="Gallery Pic">
      </div>
    </div>
    
  </div>
  
  <div class="col-sm-4">
    
    @if(count($announcements) > 0)
    <h2>Announcements</h2>
    <div class="mb-4">
      @include('includes.announcements')
    </div>
    @endif
    
    <h3>Quick Links</h3>
      @include('includes.quick_links')
    <hr class="d-sm-none">    
  </div>
  
</div>

@endsection