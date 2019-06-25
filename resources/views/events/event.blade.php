@extends('layouts.front-end')

@section('content')
  
<div class="card">
  <div class="card-body">
    <h4 class="card-title text-brown">{{$event->title}}</h4>
    <p class="card-text">
      <i class="fa fa-calendar"></i> {{nice_date($event->start_date)}}<br>
      <i class="fa fa-clock-o"></i> {{$event->starts_at}} - {{$event->ends_at}}<br>
      <i class="fa fa-map-marker"></i> {{$event->venue}}
    </p>
    <h5 class="card-title text-brown">Description</h5>
    <p>
      {{$event->description}}
    </p>
  </div>
</div>
    
@endsection