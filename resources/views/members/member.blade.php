@extends('layouts.front-end')

@section('content')
  
<div class="card">
  <div class="card-body d-flex">
    <div class="">
      <img 
        style="width: 150px; height: 150px; border-radius: 50%;"
        src="{{$member->image_url}}" alt="">
      <br>
      <span>{{fullName($member->firstname,$member->middlename,$member->lastname)}}</span>      
      <br>
      <a 
        href="{{route('members.book', ['member' => $member->id])}}"
        class="btn btn-brown">Book</a>
    </div>
    <div class="px-2">
      <h4 class="card-title">Biography</h4>
      <p class="card-text">{{$member->biography}}</p>
    </div>
  </div>
</div>
    
@endsection