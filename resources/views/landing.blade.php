@extends('layouts.front-end')

@section('styles')
<style>
  .member-card-pic {
    max-width: 100%;
    height: 200px;
  }
</style>
@endsection

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
    
    @if (count($singers))
    
      <h3>Singers</h3><br>
      
      <div class="row">
        @foreach ($singers as $singer)
          <div class="col-md-4">
            <div class="card">
              <img 
                class="card-img-top member-card-pic" 
                src="{{$singer->image_url}}" 
                alt="">
              <div class="card-body">
                <h4 class="card-title">
                  {{fullName($singer->firstname, $singer->middlename, $singer->lastname)}}
                </h4>
                <p class="card-text">{{substr($singer->biography, 0, 50) . ' ...'}}</p>
                <div class="float-right">
                  <a 
                    href="{{route('members.member', ['member'=>$singer->id])}}" 
                    class="btn btn-secondary">View</a>
                  <a 
                    href="{{route('members.book', ['member'=>$singer->id])}}" 
                    class="btn btn-brown">Book</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
        <div class="form-group col-12">
          <strong>
            <a 
              href="{{route('members.index', ['specialization'=>'singer'])}}" 
              class="float-right text-brown normal">View All Singers</a>
          </strong>
        </div>
        
      </div>
      
    @endif
    
    @if (count($instrumentalists))
    
      <h3>Instrumentalists</h3><br>
      
      <div class="row">
        @foreach ($instrumentalists as $instrumentalist)
          <div class="col-md-4">
            <div class="card">
              <img 
                class="card-img-top member-card-pic"
                src="{{$instrumentalist->image_url}}" 
                alt="">
              <div class="card-body">
                <h4 class="card-title">
                  {{fullName($instrumentalist->firstname, $instrumentalist->middlename, $instrumentalist->lastname)}}
                </h4>
                <p class="card-text">{{substr($instrumentalist->biography, 0, 50) . ' ...'}}</p>
                <div class="float-right">
                  <a 
                    href="{{route('members.member', ['member'=>$instrumentalist->id])}}" 
                    class="btn btn-secondary">View</a>
                  <a 
                    href="{{route('members.book', ['member'=>$instrumentalist->id])}}" 
                    class="btn btn-brown">Book</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
        <div class="form-group col-12">
          <strong>
            <a 
              href="{{route('members.index', ['specialization'=>'instrumentalist'])}}" 
              class="float-right text-brown normal">
              View All Instrumentalists
            </a>
          </strong>
        </div>
        
      </div>
      
    @endif
    
    @if (count($singers) === 0 && count($instrumentalists) === 0)
      <div class="d-flex justify-content-center align-items-center"
        style="min-height: 500px; font-size: 20px;">
        Members will be added soon!
      </div>
    @endif
        
  </div>
  
</div>
@endsection