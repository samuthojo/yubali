@extends('layouts.front-end')

@section('content')
  
  @if (count($events))
    
    <div class="row">
      @foreach ($events as $event)
        <div class="col-xs-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$event->title}}</h4>
              <p class="card-text">
                <i class="fa fa-calendar"></i> {{nice_date($event->start_date)}} - {{nice_date($event->end_date)}}<br>
                <i class="fa fa-clock-o"></i> {{nice_time($event->starts_at)}} - {{nice_time($event->ends_at)}}<br>
                <i class="fa fa-map-marker"></i> {{$event->venue}}
              </p>
              <a href="{{route('events.event', ['event'=>$event->id])}}" 
                class="btn btn-brown float-right">Read More</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    
  @else
  
    <div 
      class="d-flex justify-content-center align-items-center"
      style="height: 100%; font-size: 20px;">
      Events will be added soon!
    </div>
  
  @endif

@endsection