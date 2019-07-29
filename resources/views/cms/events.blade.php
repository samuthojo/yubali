@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header d-flex justify-content-between align-items-center">
    <div>Events</div>
    <div>
      <a role="button" 
        class="btn btn-pill btn-info"
        href="{{ route('events.create') }}">
        create
      </a>
    </div>
  </div>
  
  <div class="card-body">
    
    <div class="table-responsive">
      
      <table class="table table-hover" id="yubali-table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Venue</th>
            <th>Start Date</th>
            <th>Starts At</th>
            <th>End Date</th>
            <th>Ends At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($events as $event)
          <tr>
            <td>{{$event->title}}</td>
            <td>{{$event->venue}}</td>
            <td>{{nice_date($event->start_date)}}</td>
            <td>{{nice_time($event->starts_at)}}</td>
            <td>{{nice_date($event->end_date)}}</td>
            <td>{{nice_time($event->ends_at)}}</td>
            <td>
              <div class="btn-group">
                <a type="button" class="btn btn-pill btn-dark"
                  data-toggle="tooltip" title="view details"
                  href="{{route('events.edit', ['event'=>$event->id])}}">
                  Edit
                </a>
                <button type="button" class="btn btn-pill btn-warning btn-delete"
                  id="{{$event->id}}">
                  Delete
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
    
  </div>
  
</div>

@include('cms.modals.confirmation', [
  'method'=>'DELETE',
  'message'=>'You are about to delete this event!'
])

<script type="text/javascript">
$(function () {
  $(".btn-delete").on("click", function () {
    let event_id = $(this).attr("id")
    $("#acceptForm").attr("action", '/cms/events/' + event_id)
    $("#acceptRequest").modal({
      backdrop: 'static',
      keyboard: false
    })
  })
  $("#yubali-table").DataTable({
    iDisplayLength: 6,
    bLengthChange: false
  })
})
</script>

@endsection