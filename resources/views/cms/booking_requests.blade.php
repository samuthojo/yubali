@extends('cms.layouts.cms_layout')

@section('content')

<div class="card">
  
  <div class="card-header">
    {{$page_title}}
  </div>
  
  <div class="card-body">
    
    <div class="table-responsive">
      
      <table class="table table-hover" id="yubali-table">
        <thead>
          <tr>
            <th>Category</th>
            <th>Region</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($requests as $request)
          <tr>
            <td>{{service_category($request->service_category)}}</td>
            <td>{{$request->region}}</td>
            <td>{{nice_date($request->start_date)}}</td>
            <td>{{nice_date($request->end_date)}}</td>
            <td>
              <div class="btn-group">
                <a type="button" class="btn btn-pill btn-dark"
                  href="{{route('members.request', ['request'=>$request->id])}}">
                  View
                </a>
                @if(request('status') === 'pending')
                <button type="button" class="btn btn-pill btn-warning btn-decline"
                  id="{{$request->id}}">
                  Decline
                </button>
                <button type="button" class="btn btn-pill btn-success btn-accept"
                  id="{{$request->id}}">
                  Accept
                </button>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
    
  </div>
  
</div>

@include('cms.modals.accept_request')
@include('cms.modals.decline_request')

<script type="text/javascript">
$(function () {
  $(".btn-accept").on("click", function() {
    let request_id = $(this).attr('id')
    $("#acceptForm").attr("action", '/cms/bookings/' + request_id)
    $("#acceptRequest").modal({
      backdrop: 'static',
      keyboard: false
    })
  })
  $(".btn-decline").on("click", function() {
    let request_id = $(this).attr('id')
    $("#declineForm").attr("action", '/cms/bookings/' + request_id)
    $("#declineRequest").modal({
      backdrop: 'static',
      keyboard: false
    })
  })
  $("#declineRequest").on("hide.bs.modal", function (ev) {
    $('#declineTextarea').val("")
  })
  $("#yubali-table").DataTable({
    iDisplayLength: 6,
    bLengthChange: false
  })
})
</script>

@endsection