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
    
    @if (count($members))
    
      <h3>{{$specialization}}</h3><br>
      
      <div class="row">
        @foreach ($members as $member)
          <div class="col-md-4">
            <div class="card">
              <img 
                class="card-img-top member-card-pic" 
                src="{{$member->image_url}}" 
                alt="">
              <div class="card-body">
                <h4 class="card-title">
                  {{fullName($member->firstname, $member->middlename, $member->lastname)}}
                </h4>
                <p class="card-text">{{substr($member->biography, 0, 50) . ' ...'}}</p>
                <div class="float-right">
                  <a 
                    href="{{route('members.member', ['member'=>$member->id])}}" 
                    class="btn btn-secondary">View</a>
                  <a 
                    href="{{route('members.book', ['member' => $member->id])}}" 
                    class="btn btn-brown">Book</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    
    @else (count($members) === 0)
    
      <div class="d-flex justify-content-center align-items-center"
        style="height: 100%; font-size: 20px;">
        Members will be added soon!
      </div>
      
    @endif
        
  </div>
  
</div>
@endsection